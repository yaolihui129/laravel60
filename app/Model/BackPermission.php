<?php

namespace App\Model;

use App\Model;

/**
 * App\Model\BackPermission
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\BackRole[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackPermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackPermission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackPermission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\BackPermission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BackPermission extends Model{
    protected $table = "back_permissions";
    
	// 权限属于哪个角色
	public function roles()
	{
		return $this->belongsToMany(\App\Model\BackRole::class, 'back_permission_role', 'permission_id', 'role_id')
		->withPivot(['permission_id', 'role_id']);
	}
}
