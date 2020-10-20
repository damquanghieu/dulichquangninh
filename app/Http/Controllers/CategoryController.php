<?php

namespace App\Http\Controllers;

use App\Category;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory()
    {
        //$test = Category::find(71)->posts;
        // $test = Post::find(1)->categories;

        $listCategory = Category::all();
        // $countCategory = Category::all()-;

        return view('admin.page.category.list_category', ['listCategory' => $listCategory]);

    }
    public function addCategory()
    {

        return view('admin.page.category.add_category');
    }
    public function postAddCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:40',
        ],
            [
                'name.required' => 'Bạn chưa nhập tên danh mục',
                'name.min' => 'Tên danh mục phải lớn hơn 1 kí tự',
                'name.max' => 'Tên danh mục phải nhỏ hơn 40 kí tự',
            ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect('admin/pages/category/listcategory')->with('thongbao', 'Bạn đã thêm thành công');
    }

    public function getEditCategory($id)
    {
        $findCategory = Category::find($id);

        return view('admin.page.category.edit_category', ['findCategory' => $findCategory]);
    }
    public function postEditCategory(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:40',
        ],
            [
                'name.required' => 'Bạn chưa nhập tên danh mục',
                'name.min' => 'Tên danh mục phải lớn hơn 1 kí tự',
                'name.max' => 'Tên danh mục phải nhỏ hơn 40 kí tự',
            ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('admin/pages/category/listcategory')->with('thongbao', 'Bạn đã sửa thành công');
    }
    public function deleteMultiple(Request $request)
    {
        Category::whereIn('id', $request->idsArr)->delete();
        return response()->json(['status' => true, 'message' => "Xóa thành công."]);
        // return $request->idsArr;

    }

    // public function changeAction($id)
    // {
    //     $danhmuc = DanhMuc::find($id);
    //     $hd = $danhmuc->action;
    //     if ($hd == 1) {
    //         $danhmuc->action = 0;
    //     } else {
    //         $danhmuc->action = 1;
    //     }
    //     $danhmuc->save();
    //     return redirect('admin/pages/category/listcategory')->with('thongbao', 'Bạn đã sửa thành công');
    // }

    public function gettin($id)
    {
        $tintuc = DB::table('tintuc')->where('iddanhmuc', $id)->get();
        return view('admin.page.tintuc.tintuc_list', ['tintuc' => $tintuc]);
    }

}
