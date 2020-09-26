<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Slidepolicy
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
    public function viewSlide(User $user)
    {
       return $user->checkPermission('view_slide');
    }

    public function addSlide(User $user)
    {
       return $user->checkPermission('add_slide');
    }

    public function editSlide(User $user)
    {
       return $user->checkPermission('edit_slide');
    }

    public function deleteSlide(User $user)
    {
       return $user->checkPermission('delete_slide');
    }
}
