<?php
namespace App;
use Illuminate\Database\Eloquent\Model as BaseModel;
/**
 * App\Model
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model query()
 * @mixin \Eloquent
 */
class Model extends BaseModel{
    //不可以注入的数据字段
    protected $guarded=[];
}
