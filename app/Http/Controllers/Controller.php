<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
		$this->Login();
	}

	function Login(){
		
		if (Auth::check()) {
			/*// View()->share('userLogin',Auth::User());
			View::composer('*', function($view)
		    {
		    	$info = Auth::user();
		        $view->with('userLogin', $info);
		    });*/

		}
		else{
			View::composer('*', function($view)
		    {
		        $view->with('a', 'sadasdasd');
		    });
		}
	}
}
