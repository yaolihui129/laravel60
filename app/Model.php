<?php
namespace App;
use Illuminate\Database\Eloquent\Model as BaseModel;
class Model extends BaseModel{
    //不可以注入的数据字段
    protected $guarded=[];
}
