<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostsPolicy
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

    public function viewPosts(User $user)
    {
       return $user->checkPermission('view_posts');
    }

    public function addPosts(User $user)
    {
       return $user->checkPermission('add_posts');
    }

    public function editPosts(User $user)
    {
       return $user->checkPermission('edit_posts');
    }

    public function deletePosts(User $user)
    {
       return $user->checkPermission('delete_posts');
    }
}
