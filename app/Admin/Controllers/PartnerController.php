<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Partner;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Controllers\AdminController;

class PartnerController extends AdminController
{
	 public function index(Content $content)
    {
        return $content
            ->header('合作伙伴')
            ->description('列表')
            ->body(function ($row) {
                // $row->column(4, new TotalUsers());
                // $row->column(4, new NewUsers());
                // $row->column(4, new NewDevices());
            })
            ->body($this->grid());
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Partner(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name;
            $grid->img->image();
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
        return Show::make($id, new Partner(), function (Show $show) {
            $show->id;
            $show->name;
            $show->img;
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
        return Form::make(new Partner(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->image('img');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
