<?php

namespace App\Back\Controllers;

class RoleController extends Controller{
   // 角色列表
   public function index(){
	   $roles = \App\Model\BackRole::paginate(10);
	   return view("/back/role/index", compact('roles'));
   }

   // 创建角色
   public function create(){
	   return view("/back/role/add");
   }

   // 创建角色行为
   public function store()
   {
	   $this->validate(request(), [
		   'name' => 'required|min:3',
		   'description' => 'required',
	   ]);

	   \App\Model\BackRole::create(request(['name', 'description']));

	   return redirect('/back/roles');
   }

   // 角色权限关系页面
   public function permission(\App\Model\BackRole $role)
   {
	   // 获取所有权限
	   $permissions = \App\Model\BackPermission::all();
	   // 获取当前角色权限
	   $myPermissions = $role->permissions;
	   return view("/back/role/permission", compact('permissions', 'myPermissions', 'role'));
   }

   // 储存角色权限行为
   public function storePermission(\App\Model\BackRole $role)
   {
	   $this->validate(request(),[
		   'permissions' => 'required|array'
	   ]);

	   $permissions = \App\Model\BackPermission::findMany(request('permissions'));
	   $myPermissions = $role->permissions;

	   // 对已经有的权限
	   $addPermissions = $permissions->diff($myPermissions);
	   foreach ($addPermissions as $permission) {
		   $role->grantPermission($permission);
	   }

	   $deletePermissions = $myPermissions->diff($permissions);
	   foreach ($deletePermissions as $permission) {
		   $role->deletePermission($permission);
	   }
	   return back();
   }
}
