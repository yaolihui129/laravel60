<?php

namespace App\Model;

use App\Model;

/**
 * App\Model\BackRole
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\BackPermission[] $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackRole whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackRole whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BackRole extends Model{
    protected $table = "back_roles";
    
	// 当前角色的所有权限
	public function permissions(){
		return $this->belongsToMany(\App\Model\BackPermission::class, 'back_permission_role', 'role_id', 'permission_id')
		->withPivot(['permission_id', 'role_id']);
	}

	// 给角色赋予权限
	public function grantPermission($permission){
		return $this->permissions()->save($permission);
	}

	// 取消角色赋予的权限
	public function deletePermission($permission){
		return $this->permissions()->detach($permission);
	}

	// 判断角色是否有权限
	public function hasPermission($permission){
		return $this->permissions->contains($permission);
	}
}
