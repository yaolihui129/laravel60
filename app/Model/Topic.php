<?php

namespace App\Model;

use App\Model;

/**
 * App\Model\Topic
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\PostTopic[] $postTopics
 * @property-read int|null $post_topics_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Post[] $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Topic whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Topic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Topic extends Model
{
    //属于这个专题的所有文章
	public function posts(){
		return $this->belongsToMany(\App\Model\Post::class, 'post_topic', 'topic_id', 'post_id');
	}
	
	//属于这个专题的文章数,用于WithCount
	public function postTopics(){
		return $this->hasMany(\App\Model\PostTopic::class,'topic_id','id');
	}
}
