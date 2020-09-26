<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\User;
use App\Role;
class UserController extends Controller
{
	
    public function getUser(){
        $users = User::all();
    	return view('admin.page.user.user_list',['users'=>$users]);
    }

    public function addUser(){
        $roles = Role::all();
    	return view('admin.page.user.add_user',['roles' => $roles]);
    }

    public function postAddUser(Request $request){
    	$this->validate($request,[
    		'name' =>'required',
            'email'=>'required',
            'password'=>'required|min:3|max:32',
            'repassword' =>'required|same:password'
            ],[
            'name.required'=>'Bạn chưa nhập tên',
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'mật khẩu phải lớn hơn 3 ký tự',
            'password.max'=>'mật khẩu phải nhở hơn 32 ký tự',
            'repassword.same'=>'mật khẩu không trùng khớp'
            ]
        );
    	$user = new User;
    	$user->name = $request->name;
    	$user->password = bcrypt($request->password);
    	$user->email = $request->email;
        $user->save();

        $user->roles()->attach($request->roles);
    	return redirect('admin/pages/user/listuser')->with('thongbao','Thêm thành công');
    }

    public function editUser($id){
        $user = User::find($id);
        $roles = Role::all();
    	return view('admin.page.user.edit_user',['user'=>$user, 'roles'=>$roles]);
    }

    public function postEditUser(Request $request, $id)
    {
    	$this->validate($request,[
    		'name' =>'required',
            'email'=>'required',
            ],[
            'name.required'=>'Bạn chưa nhập tên',
            'email.required'=>'Bạn chưa nhập email',
        ]);

    	$user = User::find($id);
    	$user->name = $request->name;
    	$user->email = $request->email;
        $user->save();
            
        $user->roles()->sync($request->roles);
        return redirect('admin/pages/user/listuser')->with('thongbao','Sửa thành công');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        User::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Xóa thành công."]);        
    }
   
   public function changePass($id){
        $user = User::find($id);
        return view('admin.page.user.change_password',['infoUser'=>$user]);
    }

    public function postChangePass(Request $request,$id){
        {
            $this->validate($request,[
            'password'=>'required|min:6|max:32',
            'repassword' =>'required|same:password'
            ],[
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'mật khẩu phải lớn hơn 6 ký tự',
            'password.max'=>'mật khẩu phải nhở hơn 32 ký tự',
            'repassword.same'=>'mật khẩu không trùng khớp'
            ]
        );
            $user = User::find($id);
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('admin/pages/user/listuser')->with('thongbao','Sửa thành công');
        }
    }
}
