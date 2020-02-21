<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $avatar
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Fan[] $fans
 * @property-read int|null $fans_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Notice[] $notices
 * @property-read int|null $notices_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Fan[] $stars
 * @property-read int|null $stars_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 用户的文章列表
     */
	public function posts(){
		return $this->hasMany(\App\Model\Post::class,'user_id','id');
	}

	//关注我的Fans
	public function stars(){
		return $this->hasMany(\App\Model\Fan::class,'fan_id','id');
	}

	//我关注的
	public function fans(){
		return $this->hasMany(\App\Model\Fan::class,'star_id','id');
	}

	//关注某人
	public function doFan($uid){
		$fan = new \App\Model\Fan();
		$fan->star_id = $uid;
		return $this->stars()->save($fan);
	}

	//取消关注某人
	public function doUnFan($uid){
		$fan = new \App\Model\Fan();
		$fan->star_id = $uid;
		return $this->stars()->delete($fan);
	}

	//当前用户是否被某一个uid关注了
	public function hasFan($uid){
		return $this->hans()->where('fan_id',$uid)->count();
	}

	//当前用户是否关注了uid
	public function hasStar($uid){
		return $this->stars()->where('star_id',$uid)->count();
	}
	// 用户收到的通知
	public function notices(){
		return $this->belongsToMany(\App\Model\Notice::class, 'user_notice', 'user_id', 'notice_id')
		->withPivot(['user_id', 'notice_id']);
	}

	// 给用户增加通知
	public function addNotice($notice)
	{
		return $this->notices()->save($notice);  // detach
	}
	
}