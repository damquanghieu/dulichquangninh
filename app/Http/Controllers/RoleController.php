<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
    public function getPermission()
    {
       $permissions = Permission::all();
       return view('admin.page.role.list_permission',['permissions'=> $permissions]);

    }
    public function getRole()
    {
        $getRoles = Role::all();
        return view('admin.page.role.list_role',['getRoles'=>$getRoles]);
    }

    public function getAddRole()
    {
        $parentPermission = Permission::where('parent_id',0)->get();

        return view('admin.page.role.add_role',['parentPermission'=> $parentPermission]);
    }

    public function postAddRole(Request $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        $role->permissions()->attach($request->permissions);
        return  redirect()->back()->with('thongbao','Ok');
    }

    public function getEditRole(Request  $request, $id)
    {
        $findRole = Role::find($id);
        $parentPermission = Permission::where('parent_id',0)->get();
        return view('admin.page.role.edit_role',['parentPermission'=>$parentPermission, 'findRole'=> $findRole]);
    }

    public function postEditRole(Request $request, $id)
    {
       $role = Role::find($id);
       $role->name = $request->name;
       $role->description = $request->description;
       $role->save();

       $role->permissions()->sync($request->permissions);
       return redirect()->back()->with('thongbao','Sửa role thành công');
    }
    
    public function deleteMultipleRole(Request $request)
    {
        // foreach($request->idsArr as $id) {
        //     $role = Role::find($id);
        //     $role->permissions()->detach();
        // }
        Role::whereIn('id',$request->idsArr)->delete();
        return response()->json(['status'=>true,'message'=>"Xóa thành công."]);        
    }
}
