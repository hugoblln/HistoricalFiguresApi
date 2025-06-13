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
            'create figures',
            'update figures',
            'delete figures',
            'view figures',
            'viewAny figures',
            'delete users',
            'update users',
            'view users',
            'viewAny users',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

            $adminRole = Role::where('name', 'admin')->first();
            $editorRole = Role::where('name', 'editor')->first();
            $viewerRole = Role::where('name', 'viewer')->first();

            $adminRole->givePermissionTo($permissions);
            $editorRole->givePermissionTo([
                'create figures',
                'update figures',
                'delete figures',
                'view figures',
                'viewAny figures',
            ]);
            $viewerRole->givePermissionTo([
                'view figures',
                'viewAny figures',
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
              $permissions = [
            'create figures',
            'edit figures',
            'delete figures',
            'view figures',
            'viewAny figures',
            'delete users',
            'update users',
            'view users',
            'viewAny users',
        ];

        Permission::whereIn('name', $permissions)->delete();
    }
    
};
