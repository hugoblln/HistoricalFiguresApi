<?php

namespace App\Policies;

use App\Models\Figure;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FigurePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('viewAny figures');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Figure $figure): bool
    {
        return $user->hasPermissionTo('view figures');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create figures');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Figure $figure): bool
    {
        return $user->hasPermissionTo('update figures');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Figure $figure): bool
    {
        return $user->hasPermissionTo('delete figures');
    }
}
