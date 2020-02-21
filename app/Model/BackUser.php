<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Model\BackUser
 *
 * @property int $id
 * @property string $name
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\BackRole[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BackUser extends Authenticatable{
    protected $rememberTokenName = '';
    
	protected $guarded = [];

	// 用户有哪一些角色
	public function roles()
	{
		return $this->belongsToMany(\App\Model\BackRole::class, 'back_role_user', 'user_id', 'role_id')
		->withPivot(['user_id', 'role_id']);
	}

	// 判断是否有某个角色，某些角色
	public function isInRoles($roles)
	{
		return !!$roles->intersect($this->roles)->count();
	}

	// 给用户分配角色
	public function assignRole($role)
	{
		return $this->roles()->save($role);
	}

	// 取消用户分配的角色
	public function deleteRole($role)
	{
		return $this->roles()->detach($role);
	}

	// 用户是否有权限
	public function hasPermission($permission)
	{
		return $this->isInRoles($permission->roles);
	}
}
