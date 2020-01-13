<?php
namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use James\Admin\Breadcrumb\BaseController;
use App\Models\Campaign\VersionModel;
use Zhusaidong\GridExporter\Exporter;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;


class VersionController extends AdminController
{

    /**
     * 标题设置
     * @var string
     */
    protected $title = '版本号';

    /**
     * 列表页
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new VersionModel);
        $grid->column('id', __('ID'))->sortable();
        $grid->column('chrVersionKey', __('关键字'))->sortable()->help('这一列是...');
        $grid->column('chrVersionName', __('版本号'))->sortable()->link('#');
        $grid->column('IssueDate', __('发布时间'))->sortable();
        $grid->column('updated_at')->hide();
        //快捷搜索
//        $grid->quickSearch('chrVersionName');
        // filter($callback)方法用来设置表格的简单搜索框
        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('chrVersionKey', '关键字');
            $filter->like('chrVersionName', '版本号');
            // 设置created_at字段的范围查询
            $filter->between('IssueDate', '发布时间')->datetime();
        });
        //禁用导出数据按钮
        $grid->disableExport();
        //禁用行选择checkbox
        $grid->disableRowSelector();
        //禁用行操作列
//        $grid->disableActions();
        //禁用行选择器
        $grid->disableColumnSelector();
        //设置分页选择器选项
        $grid->perPages([10, 20, 30, 40, 50]);
        //在grid页面加入了几个操作快捷键:
        //s-快捷搜索聚焦,f-展开或者隐藏过滤器,r-刷新页面,c-进入创建页面,left-跳转上一页,right-跳转下一页
        $grid->enableHotKeys();

        //快捷创建
        $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
            $create->text('chrVersionKey', '关键字');
            $create->text('chrVersionName', '版本号');
            $create->date('IssueDate', '发布时间');
        });

        $exporter = Exporter::get($grid);
        //设置导出文件名
        $exporter->setFileName('导出文件名.xlsx');
        //设置排除列
        $exporter->setExclusions(['排除列1','排除列2']);
        $exporter->setExclusion('排除列3');

        return $grid;
    }

    /**
     * 查看页
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(VersionModel::findOrFail($id));
        $show->field('id', __('ID'));
        $show->field('chrVersionKey', __('关键字'));
        $show->field('chrVersionName', __('版本号'));
        $show->field('IssueDate', __('发布时间'));
        $show->display('created_at', '创建时间');
        $show->display('updated_at', '修改时间');
        return $show;
    }

    /**
     * 表单页设置
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new VersionModel);
        $form->display('id', __('ID'));
        $form->text('chrVersionKey', __('关键字'));
        $form->text('chrVersionName', __('版本号'));
        $form->date('IssueDate', __('发布时间'));
        // 两个时间显示
        $form->display('created_at', '创建时间');
        $form->display('updated_at', '修改时间');
        $form->tools(function (Form\Tools $tools) {
            // 去掉`列表`按钮
//            $tools->disableList();
            // 去掉`删除`按钮
            $tools->disableDelete();
            // 去掉`查看`按钮
            $tools->disableView();
            // 添加一个按钮, 参数可以是字符串, 或者实现了Renderable或Htmlable接口的对象实例
            $tools->add('<a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;delete</a>');
        });


        $form->footer(function ($footer) {
            // 去掉`重置`按钮
//            $footer->disableReset();
            // 去掉`提交`按钮
//            $footer->disableSubmit();
            // 去掉`查看`checkbox
            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
//            $footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
//            $footer->disableCreatingCheck();

        });

        return $form;
    }

}
