<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $permissions = [
            'create domains',
            'update domains',
            'delete domains',
            'view domains',
            'viewAny domains',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();
        $viewerRole = Role::where('name', 'viewer')->first();

        $adminRole->givePermissionTo($permissions);
        $editorRole->givePermissionTo($permissions);
        $viewerRole->givePermissionTo([
            'view domains',
            'viewAny domains',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
             $permissions = [
            'create domains',
            'update domains',
            'delete domains',
            'view domains',
            'viewAny domains',
        ];

        Permission::whereIn('name', $permissions)->delete();
    }
};
