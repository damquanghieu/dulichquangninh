<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
    public function viewUser(User $user)
    {
       return $user->checkPermission('view_user');
    }

    public function addUser(User $user)
    {
       return $user->checkPermission('add_user');
    }

    public function editUser(User $user)
    {
       return $user->checkPermission('edit_user');
    }

    public function deleteUser(User $user)
    {
       return $user->checkPermission('delete_user');
    }
}
