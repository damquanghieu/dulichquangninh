<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\User;

class CategoryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role = User::find(Auth::user()->id)->roles->toArray();
        foreach ($role as $rl) {
            if ($rl['id'] == 1 || Auth::user()->super_admin == 1) {
                return $next($request);
                break;
            }
        }
        return redirect('admin/pages/home');
    }
}
