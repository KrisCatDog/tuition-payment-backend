<?php

namespace App\Policies;

use App\Models\IClass;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IClassPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role->permissions()->where('name', 'viewAny class')->first() != null;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IClass  $iClass
     * @return mixed
     */
    public function view(User $user, IClass $iClass)
    {
        return $user->role->permissions()->where('name', 'view class')->first() != null;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role->permissions()->where('name', 'create class')->first() != null;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IClass  $iClass
     * @return mixed
     */
    public function update(User $user, IClass $iClass)
    {
        return $user->role->permissions()->where('name', 'update class')->first() != null;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IClass  $iClass
     * @return mixed
     */
    public function delete(User $user, IClass $iClass)
    {
        return $user->role->permissions()->where('name', 'delete class')->first() != null;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IClass  $iClass
     * @return mixed
     */
    public function restore(User $user, IClass $iClass)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IClass  $iClass
     * @return mixed
     */
    public function forceDelete(User $user, IClass $iClass)
    {
        //
    }
}
