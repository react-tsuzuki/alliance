<?php

namespace App\Admin\Controllers;

use App\Models\Customer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Tab;

class CustomerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Customer';

    /**
     * Index interface.
     *
     * @return Content
     */

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Customer());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        // $grid->column('email', __('Email'));
        // $grid->column('email_verified_at', __('Email verified at'));
        // $grid->column('password', __('Password'));
        // $grid->column('remember_token', __('Remember token'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

        // 一覧画面のフィルタに表示させるリンク
        $grid->filter(function ($filter){
            $filter->like('customer_id',"会員ID");
            $filter->like('first_name',"顧客名");
            $filter->like('prefecture',"都道府県");
            $filter->like('city',"市区町村");
            $filter->like('address',"住所");
            $filter->like('mansion',"マンション名");
            $filter->like('mail_address',"メールアドレス");
            $filter->like('main_tel',"電話番号");
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
        $show = new Show(Customer::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Customer());



        return $form;
    }
}
