<?php
namespace App\Model;
use App\Model;
/**
 * App\Model\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property int $post_id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comment whereUserId($value)
 * @mixin \Eloquent
 */
class Comment extends Model{
    //评论所属文章
	public function post(){
		return belongTo('App\Model\Post');
	}
	// 评论所属用户
	public function user(){
		return $this->belongsTo('App\User');
	}
}