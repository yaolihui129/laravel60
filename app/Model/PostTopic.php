<?php
namespace App\Model;
use App\Model;
/**
 * App\Model\PostTopic
 *
 * @property int $id
 * @property int $post_id
 * @property int $topic_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\PostTopic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\PostTopic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\PostTopic query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\PostTopic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\PostTopic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\PostTopic wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\PostTopic whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\PostTopic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PostTopic extends Model{
    /**
     * 定义关联表名
     */
    protected $table = "post_topic";
}
