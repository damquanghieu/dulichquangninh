<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    public function getSlide()
    {
    	$listSlide = Slide::all();
   		return view('admin.page.slide.list_slide',['listSlide' =>$listSlide]);
    }
    public function getAddSlide()
    {
    	return view('admin.page.slide.add_slide');
    }
    public function postAddSlide(Request $request)
    {
        $this ->validate($request,
            [
                'title_slide' => 'required|max:200|min:5',
                'content_slide' => 'required|max:5000|min:1',
                
            ],
            [
                'title_slide.required' => 'Tên tiêu đề không được trống',
                'content_slide.required' => 'Tên nội dung không được trống',
               

                'title_slide.min' => 'Tên tiêu đề lớn hơn 5 kí tự',
                'title_slide.max' => 'Tên tiêu đề nhỏ hơn 200 kí tự',

                'content_slide.min' => 'Tên nội dung phải lớn hơn 10 kí tự',
                'content_slide.max' => 'Tên nội dung nhỏ hơn 1500 kí tự'
            ]
        );

    	$slide = new Slide;
    	$slide->title_slide = $request ->title_slide;
    	$slide->content_slide = $request ->content_slide;
        $slide->slide = $request->slide;
        
	    	if ($request ->hasFile('image_slide')) {
	    		$file = $request-> file('image_slide');
                $extension = $file->getClientoriginalExtension();

                    if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                        return redirect('admin/pages/posts/addposts')
                        -> with('loi','Đuôi ảnh phải thuộc định dạng jpg,png,jpeg.'); 
                    }
                    $changeName = $file->getClientOriginalName();
                    $newName = str_random(5)."_". $changeName;
                    $file -> move('slide_image/', $newName);
                     

	    		
	    	}
	    	else 
            {
                return redirect('admin/pages/slide/addslide')-> with('loi','Bạn chưa chọn ảnh');
	    		
	    	}
    		
	    $slide->image_slide = $newName;
    	$slide ->save();
    	return redirect('admin/pages/slide/addslide')->with('thongbao' ,'Bạn đã thêm thành công');
    }

    public function getEditSlide($id)
    {
		$editSlide = Slide::find($id);
		return view('admin.page.slide.edit_slide',['editSlide' => $editSlide]);
    }
    public function postEditSlide(Request $request)
    {
        $this ->validate($request,
            [
                'title_slide' => 'required|max:200|min:5',
                'content_slide' => 'required|max:5000|min:1',
                
            ],
            [
                'title_slide.required' => 'Tên tiêu đề không được trống',
                'content_slide.required' => 'Tên nội dung không được trống',
            

                'title_slide.min' => 'Tên tiêu đề lớn hơn 5 kí tự',
                'title_slide.max' => 'Tên tiêu đề nhỏ hơn 200 kí tự',

                'content_slide.min' => 'Tên nội dung phải lớn hơn 10 kí tự',
                'content_slide.max' => 'Tên nội dung nhỏ hơn 1500 kí tự'
            ]
        );

    	$slide = Slide::find($request->id);
    	$slide->title_slide = $request ->title_slide;
    	$slide->content_slide = $request ->content_slide;
        $slide->slide = $request->slide;

        if($request ->hasFile('image_slide'))
        {
            $file = $request->file('image_slide');
            $getName = $file->getClientOriginalName();
            $newName = str_random(7)."_".$getName;
            $file->move('slide_image/', $newName);
            $slide->image_slide = $newName;
        }
        else
        {
            $slide ->save();
            return redirect('admin/pages/slide/listslide')->with('thongbao','Bạn đã sửa thành công');
        }
    	$slide ->save();
        return redirect('admin/pages/slide/listslide')->with('thongbao','Bạn đã sửa thành công');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        Slide::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Xóa thành công."]);        
    }
}
