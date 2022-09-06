<?php

namespace App\Admin\Controllers;

use App\Models\Human;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class HumanController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Human';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Human());

        $grid->id('id');
        $grid->name('名前');
        $grid->detail()->tel('TEL');
        $grid->staff()->name('スタッフ名');
        $grid->status('状態');
        $grid->created_at('作成日時');
        $grid->updated_at('更新日時');
    
        $grid->actions(function ($actions) {
            $actions->disableView();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Human::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('staff_id', __('Staff id'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Human());

        $form->text('name', '顧客名');
        $form->select('staff_id')->options(Staff::pluck('name', 'id'));
        $form->text('detail.tel', 'TEL');
        $form->date('detail.contracted_at', '契約日')->format('YYYY-MM-DD');
        $states = [
            'on'  => ['value' => 'active', 'text' => '稼働', 'color' => 'success'],
            'off' => ['value' => 'stop', 'text' => '停止', 'color' => 'danger'],
        ];
        $form->switch('status', '状態')->states($states)->default('on');

        return $form;
    }
}
