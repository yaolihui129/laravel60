<?php
namespace App\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model;
/**
 * App\Model\Integrate
 *
 * @property int $id
 * @property string|null $chrIntergrateKey 集成Key
 * @property string|null $chrIntegrateName 集成号
 * @property string|null $chrIntegrateDescribe 描述
 * @property int|null $intVersionID 外键-版本号
 * @property string|null $start_at 开始日期
 * @property string|null $end_at 结束日期
 * @property string|null $created_by 系统-创建人
 * @property string|null $updated_by 系统-更新者
 * @property \Illuminate\Support\Carbon|null $deleted_at 软删除标识
 * @property \Illuminate\Support\Carbon|null $created_at 系统-创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 系统-修改时间
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Integrate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate whereChrIntegrateDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate whereChrIntegrateName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate whereChrIntergrateKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate whereIntVersionID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Integrate whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Integrate withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Integrate withoutTrashed()
 * @mixin \Eloquent
 */
class Integrate extends Model {
    use SoftDeletes;
    /**
     * 集成号
     * 关联到模型的数据表
     * @var string
     */
    protected $table = 'ys_integrate';
    /**
     * 应该被调整为日期的属性
     * @var array
     */
    protected $dates = ['deleted_at'];
}