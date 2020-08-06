<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Config;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class ConfigController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Config(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->site_name;
            $grid->logo;
            $grid->tel;
            $grid->tel_img;
            $grid->wxgzh;
            $grid->record;
            $grid->record_info;
            $grid->seo_key;
            $grid->seo_desc;
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
        return Show::make($id, new Config(), function (Show $show) {
            $show->id;
            $show->site_name;
            $show->logo;
            $show->tel;
            $show->tel_img;
            $show->wxgzh;
            $show->record;
            $show->record_info;
            $show->seo_key;
            $show->seo_desc;
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
        return Form::make(new Config(), function (Form $form) {
            $form->display('id');
            $form->text('site_name');
            $form->text('logo');
            $form->text('tel');
            $form->text('tel_img');
            $form->text('wxgzh');
            $form->text('record');
            $form->text('record_info');
            $form->text('seo_key');
            $form->text('seo_desc');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
