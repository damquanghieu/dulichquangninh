<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
    public function viewCategory(User $user)
    {
       return $user->checkPermission('view_category');
    }

    public function addCategory(User $user)
    {
       return $user->checkPermission('add_category');
    }

    public function editCategory(User $user)
    {
       return $user->checkPermission('edit_category');
    }

    public function deleteCategory(User $user)
    {
       return $user->checkPermission('delete_category');
    }
    
}
