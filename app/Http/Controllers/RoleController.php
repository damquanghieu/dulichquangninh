<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getPermission()
    {
        $permissions = Permission::all();
        return view('admin.page.role.list_permission', ['permissions' => $permissions]);

    }
    public function getRole()
    {
        $getRoles = Role::all();
        return view('admin.page.role.list_role', ['getRoles' => $getRoles]);
    }

    public function getAddRole()
    {
        $parentPermission = Permission::where('parent_id', 0)->get();

        return view('admin.page.role.add_role', ['parentPermission' => $parentPermission]);
    }

    public function postAddRole(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:400',
                'description' => 'required|max:400',
            ],
            [
                'name.required' => 'Tên vai trò không được trống!',
                'name.max' => 'Tên vai trò phải nhỏ hơn 400 kí tự',

                'description.required' => 'Mô vai trò không được trống!',
                'description.max' => 'Tên vai trò phải nhỏ hơn 400 kí tự',
            ]);

        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        $role->permissions()->attach($request->permissions);
        return redirect()->back()->with('thongbao', 'Thêm vai trò thành công');
    }

    public function getEditRole(Request $request, $id)
    {
        $findRole = Role::find($id);
        $parentPermission = Permission::where('parent_id', 0)->get();
        return view('admin.page.role.edit_role', ['parentPermission' => $parentPermission, 'findRole' => $findRole]);
    }

    public function postEditRole(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required|max:400',
                'description' => 'required|max:400',
            ],
            [
                'name.required' => 'Tên vai trò không được trống!',
                'name.max' => 'Tên vai trò phải nhỏ hơn 400 kí tự',

                'description.required' => 'Mô vai trò không được trống!',
                'description.max' => 'Tên vai trò phải nhỏ hơn 400 kí tự',
            ]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        $role->permissions()->sync($request->permissions);
        return redirect()->back()->with('thongbao', 'Sửa role thành công');
    }

    public function deleteMultipleRole(Request $request)
    {
        // foreach($request->idsArr as $id) {
        //     $role = Role::find($id);
        //     $role->permissions()->detach();
        // }
        Role::whereIn('id', $request->idsArr)->delete();
        return response()->json(['status' => true, 'message' => "Xóa thành công."]);
    }
}
