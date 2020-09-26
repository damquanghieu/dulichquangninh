<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Post;
use App\Slide;

class UIController extends Controller

{
	public function __construct(){

		$slideshow = Slide::all();
		view()->share('slideshow',$slideshow);
		// view()->share('danhmuclast',$danhmuclast);
		// view()->share('slideshow',$slideshow);
	}



	function trangchu()
	{
		
		$top5 = Category::find(78)->posts;
		$toplist = Category::find(83)->posts;
		$reviews = Category::find(80)->posts;
		return view('ui.pages.trangchu',['reviews' => $reviews, 'top5' =>$top5, 'toplist'=>$toplist]);
	}

	function loaitin($id){

		$showtin = TinTuc::where('iddanhmuc', $id)->get();
		
		return view('ui.pages.trangchu_tintuc',['showtin'=>$showtin]);
	}
	function chitiet($id){

		$chitiet = Post::find($id);
		
		return view('ui.pages.trangchu_chitiet',['chitiet'=>$chitiet]);
	}

}