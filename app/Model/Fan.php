<?php
namespace App\Model;
use App\Model;
/**
 * App\Model\Fan
 *
 * @property int $id
 * @property int $fan_id
 * @property int $star_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $fuser
 * @property-read \App\User $suser
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Fan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Fan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Fan query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Fan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Fan whereFanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Fan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Fan whereStarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Fan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Fan extends Model{
    //粉丝用户
	public function fuser(){
		return $this->hasOne(\App\User::class, 'id', 'fan_id');
	}	
	//关注用户
	public function suser(){
		return $this->hasOne(\App\User::class,'id','star_id');
	}
}