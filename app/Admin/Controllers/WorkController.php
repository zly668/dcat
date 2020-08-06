<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Work;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

use App\Admin\Actions\Grid\Reast;
class WorkController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Work(), function (Grid $grid) {
        		$grid->tools(function (Grid\Tools $tools) {
		      // excle 导入
		      $tools->append(new Reast());
		});
		$grid->content
    ->display('查看') // 设置按钮名称
    ->modal(function ($modal) {
        // 设置弹窗标题
        $modal->title('标题 '.$this->username);

       
        return "<video controls width='250'>
        <source src ='$this->url'>
        </video>";
    });
            $grid->id->sortable();
            $grid->cyid;
            // $grid->tab;
            $grid->column('tab')->editable(true);
            $grid->bz;
            $grid->desc;
            $grid->app_name;
            $grid->author;
            $grid->username;
            $grid->goodsname;
            // $grid->url;
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Work(), function (Show $show) {
            $show->id;
            $show->cyid;
            $show->tab;
            $show->bz;
            $show->desc;
            $show->app_name;
            $show->author;
            $show->username;
            $show->goodsname;
            $show->url;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Work(), function (Form $form) {
        	
        	$form->html('你的html内容', 'url');
            $form->display('id');
            $form->text('cyid');
            $form->text('tab');
            $form->text('bz');
            $form->text('desc');
            $form->text('app_name');
            $form->text('author');
            $form->text('username');
            $form->text('goodsname');
            $form->text('url');
        });
    }
}
