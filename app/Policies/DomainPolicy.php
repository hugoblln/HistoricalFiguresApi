<?php

namespace App\Policies;

use App\Models\Domain;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DomainPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('viewAny domains');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Domain $domain): bool
    {
        return $user->hasPermissionTo('view domains');
               
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $iser->hasPermissionTo('create domains');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Domain $domain): bool
    {
        return $user->hasPermissionTo('update domains');  
    }


    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Domain $domain): bool
    {
        return $user->hasPermissionTo('delete domains');
    }
}
