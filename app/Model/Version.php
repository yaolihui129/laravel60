<?php 

namespace App\Model;
use App\Model;
/**
 * App\Model\Version
 *
 * @property int $id ID
 * @property string|null $chrVersionKey 版本关键字
 * @property string|null $chrVersionName 版本号
 * @property string|null $chrVersionDescribe 版本描述
 * @property string|null $IssueDate 发版日期
 * @property int|null $intProduct 所属产品
 * @property string|null $created_by 系统-添加者
 * @property string|null $updated_by 系统-更新者
 * @property string|null $deleted_at 软删除标识
 * @property \Illuminate\Support\Carbon|null $created_at 系统-创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at 系统-更新时间
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereChrVersionDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereChrVersionKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereChrVersionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereIntProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereIssueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Version whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Version extends Model {
    /**
     * 版本号
     * 关联到模型的数据表
     * @var string
     */
    protected $table = 'ys_version';


}
