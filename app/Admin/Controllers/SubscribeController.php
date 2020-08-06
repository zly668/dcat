<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Subscribe;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class SubscribeController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Subscribe(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->phone;
            $grid->ip;
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
        return Show::make($id, new Subscribe(), function (Show $show) {
            $show->id;
            $show->phone;
            $show->ip;
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
        return Form::make(new Subscribe(), function (Form $form) {
            $form->display('id');
            $form->text('phone');
            $form->text('ip');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
