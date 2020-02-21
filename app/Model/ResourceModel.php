<?php 
namespace App\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model;
/**
 * App\Model\ResourceModel
 *
 * @property int $id ID
 * @property string|null $enumType 类型:0-all,1-api,2-bug,3-listLeft,4-listRight,5-pmdLeft,6-pmdRight,7-story,8-water
 * @property string|null $resDate 业务时间
 * @property int|null $intVersionID 版本ID
 * @property int|null $intIntegrateID 集成号ID
 * @property string|null $textJson 数据:{"data":[]}
 * @property string|null $created_by 创建者
 * @property string|null $updated_by 更新者
 * @property \Illuminate\Support\Carbon|null $deleted_at 软删除标识
 * @property \Illuminate\Support\Carbon|null $created_at 系统数据-创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 系统数据-更新时间
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ResourceModel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel whereEnumType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel whereIntIntegrateID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel whereIntVersionID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel whereResDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel whereTextJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\ResourceModel whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ResourceModel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\ResourceModel withoutTrashed()
 * @mixin \Eloquent
 */
class ResourceModel extends Model {
    use SoftDeletes;
    /**
     * 资源模型
     * 定义关联数据表
     * @var string
     */
    protected $table = 'ys_resource';
    /**
     * 应该被调整为日期的属性
     * @var array
     */
    protected $dates = ['deleted_at'];
}
