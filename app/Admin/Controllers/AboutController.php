<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\About;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class AboutController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new About(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->title;
            $grid->banner->image();
            $grid->small_title;
            $grid->content;
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
        return Show::make($id, new About(), function (Show $show) {
            $show->id;
            $show->title;
            $show->banner;
            $show->small_title;
            $show->content;
            $show->created_at;
            $show->updated_at;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new About(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->image('banner');
            $form->text('small_title');
            $form->ueditor('content')->height(500);
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
