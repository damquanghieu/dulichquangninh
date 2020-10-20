<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function getPosts()
    {
        $listPosts = Post::all();
        return view('admin.page.posts.list_posts', ['listPosts' => $listPosts]);
    }
    public function getPost($id)
    {
        $listPosts = Category::find($id)->posts;
        return view('admin.page.posts.list_posts', ['listPosts' => $listPosts]);
    }
    public function getAddPost()
    {

        $listPost = Post::all();
        $listCategory = Category::all();
        return view('admin.page.posts.add_posts', ['listPost' => $listPost, 'listCategory' => $listCategory]);
    }
    public function postAddPost(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|max:200|min:5',
                'address' => 'required|max:300|min:10',
                'content' => 'required|max:5000|min:1',

            ],
            [
                'title.required' => 'Tên tiêu đề không được trống',
                'address.required' => 'Tên địa chỉ không được trống',
                'content.required' => 'Tên nội dung không được trống',

                'title.min' => 'Tên tiêu đề lớn hơn 5 kí tự',
                'title.max' => 'Tên tiêu đề nhỏ hơn 200 kí tự',

                'address.min' => 'Tên địa chỉ phải lớn hơn 10 kí tự',
                'address.max' => 'Tên địa chỉ phải nhỏ hơn 300 kí tự',

                'content.min' => 'Tên nội dung phải lớn hơn 10 kí tự',
                'content.max' => 'Tên nội dung nhỏ hơn 1500 kí tự',
            ]);

        $posts = new Post;
        $posts->title = $request->title;
        $posts->address = $request->address;
        $posts->content = $request->content;
        $posts->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientoriginalExtension();

            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('admin/pages/posts/addposts')
                    ->with('loi', 'Đuôi ảnh phải thuộc định dạng jpg,png,jpeg.');
            }

            $changeName = $file->getClientOriginalName();
            $newName = str_random(5) . "_" . $changeName;
            $file->move('tintuc_image/', $newName);
        } else {
            return redirect('admin/pages/posts/addposts')->with('loi', 'Bạn chưa chọn ảnh');

        }

        $posts->image = $newName;
        $posts->save();
        return redirect('admin/pages/posts/listposts')->with('thongbao', 'Bạn đã thêm thành công');
    }

    public function getEditPost($id)
    {
        $editPost = Post::find($id);
        $listCategory = Category::all();
        return view('admin.page.posts.edit_posts', ['editPost' => $editPost], ['listCategory' => $listCategory]);
    }
    public function postEditPost(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|max:200|min:5',
                'address' => 'required|max:300|min:10',
                'content' => 'required|max:5000|min:1',

            ],
            [
                'title.required' => 'Tên tiêu đề không được trống',
                'address.required' => 'Tên địa chỉ không được trống',
                'content.required' => 'Tên nội dung không được trống',
                'anh.required' => "Bạn chưa chọn ảnh",

                'title.min' => 'Tên tiêu đề lớn hơn 5 kí tự',
                'title.max' => 'Tên tiêu đề nhỏ hơn 200 kí tự',

                'address.min' => 'Tên địa chỉ phải lớn hơn 10 kí tự',
                'address.max' => 'Tên địa chỉ phải nhỏ hơn 300 kí tự',

                'content.min' => 'Tên nội dung phải lớn hơn 10 kí tự',
                'content.max' => 'Tên nội dung nhỏ hơn 5000 kí tự',
            ]);

        $posts = Post::find($request->id);
        $posts->title = $request->title;
        $posts->address = $request->address;
        $posts->content = $request->content;
        $posts->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $getName = $file->getClientOriginalName();
            $newName = str_random(7) . "_" . $getName;
            $file->move('tintuc_image/', $newName);
            $posts->image = $newName;
        } else {
            $posts->save();
            return redirect('admin/pages/posts/listposts')->with('thongbao', 'Bạn đã sửa thành công');
        }
        $posts->save();
        return redirect('admin/pages/posts/listposts')->with('thongbao', 'Bạn đã sửa thành công');
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        Post::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['status' => true, 'message' => "Xóa thành công."]);
    }

    // public function changeAction($id)
    // {
    //     $danhmuc = DanhMuc::find($id);
    //     $hd = $danhmuc -> action;
    //     if ($hd == 1) {
    //         $danhmuc -> action = 0;
    //     }else{
    //         $danhmuc -> action = 1;
    //     }
    //      $danhmuc ->save();
    //      return redirect('admin/pages/category/listcategory') ->with('thongbao','Bạn đã sửa thành công');

    // }
}
