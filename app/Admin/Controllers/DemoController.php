<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Demo;
use Dcat\Admin\Form;
use App\Admin\Actions\ExcelAdd;
use App\Admin\Actions\Form\Add;

use App\Admin\Actions\Grid\Reast;

use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Controllers\AdminController;

use App\Admin\Forms\Set;

class DemoController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Demo(), function (Grid $grid) {
		$grid->tools(function (Grid\Tools $tools) {
		      // excle 导入
		      $tools->append(new Reast());
		});

        	$grid->export()->xlsx();
        	$grid->setDialogFormDimensions('50%', '50%');
            $grid->id->sortable();
            $grid->img;
            $grid->content;
            $grid->static;
            $grid->created_at;
            $grid->updated_at->sortable();
        
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
        return Show::make($id, new Demo(), function (Show $show) {
            $show->id;
            $show->img;
            $show->content;
            $show->static;
            $show->created_at;
            $show->updated_at;
        });
    }
     public function create(Content $content)
        {
            return $content
                ->header(trans('admin.roles'))
                ->description(trans('admin.create'))
                ->body($this->form());
        }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Demo(), function (Form $form) {
        
            $form->display('id');
            $form->text('img');
            $form->text('content');
            $form->text('static');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
