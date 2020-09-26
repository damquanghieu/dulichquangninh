<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function viewRole(User $user)
    {
       return $user->checkPermission('view_role');
    }

    public function addRole(User $user)
    {
       return $user->checkPermission('add_role');
    }

    public function editRole(User $user)
    {
       return $user->checkPermission('edit_role');
    }

    public function deleteRole(User $user)
    {
       return $user->checkPermission('delete_role');
    }
}
