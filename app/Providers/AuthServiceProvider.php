<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
       ' App\Category => App\Policies\CategoryPolicy',
        'App\Post' => 'App\Policies\PostsPolicy',
        'App\Slide' => 'App\Policies\SlidePolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Role' => 'App\Policies\RolePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       Gate::define('viewcategory','App\Policies\CategoryPolicy@viewCategory');
       Gate::define('addcategory','App\Policies\CategoryPolicy@addCategory');
       Gate::define('editcategory','App\Policies\CategoryPolicy@editCategory');
       Gate::define('deletecategory','App\Policies\CategoryPolicy@deleteCategory');

       Gate::define('viewposts','App\Policies\PostsPolicy@viewPosts');
       Gate::define('addposts','App\Policies\PostsPolicy@addPosts');
       Gate::define('editposts','App\Policies\PostsPolicy@editPosts');
       Gate::define('deleteposts','App\Policies\PostsPolicy@deletePosts');

       Gate::define('viewslide','App\Policies\SlidePolicy@viewSlide');
       Gate::define('addslide','App\Policies\SlidePolicy@addSlide');
       Gate::define('editslide','App\Policies\SlidePolicy@editSlide');
       Gate::define('deleteslide','App\Policies\SlidePolicy@deleteSlide');

       Gate::define('viewuser','App\Policies\UserPolicy@viewUser');
       Gate::define('adduser','App\Policies\UserPolicy@addUser');
       Gate::define('edituser','App\Policies\UserPolicy@editUser');
       Gate::define('deleteuser','App\Policies\UserPolicy@deleteUser');

       Gate::define('viewrole','App\Policies\RolePolicy@viewRole');
       Gate::define('addrole','App\Policies\RolePolicy@addRole');
       Gate::define('editrole','App\Policies\RolePolicy@editRole');
       Gate::define('deleterole','App\Policies\RolePolicy@deleteRole');




        // Gate::define('viewcategory',function()
        // {
        //     return false;
        // });
    
    }
}
