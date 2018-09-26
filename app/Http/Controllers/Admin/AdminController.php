<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Menu;

abstract class AdminController extends Controller
{
    protected $template = 'admin.index';
    protected $content = false;
    protected $title;
    protected $jss;
    protected $vars;
    protected $breadcrumb;

    public function renderOutput()
    {
        $this->vars = array_add($this->vars, 'title', $this->title);
        $this->vars = array_add($this->vars, 'jss', $this->jss);
        $this->vars = array_add($this->vars, 'breadcrumb', $this->breadcrumb);

        $this->vars = array_add($this->vars, 'content', $this->content);

        return view($this->template)->with($this->vars);
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public static function getMenu()
    {
        $menu =  Menu::make('adminMenu', function ($menu) {

            if (Gate::allows('VIEW_ADMIN')) {
                $menu->add(trans('admin.menu_main'), array('route' => 'admin.index', 'class' => 'main'))
                    ->prepend('<i class="fa fa-dashboard"></i> <span>');
            }

            if (Gate::allows('ADMIN_USERS')) {
                $menu->add(trans('admin.menu_users'), ['class' => 'users treeview'])
                    ->prepend('<i class="fa fa-users"></i> <span>')
                    ->nickname('menu_users');
                $menu->item('menu_users')
                        ->add(trans('admin.all_users'), ['route' => 'admin.users.index'])
                    ->prepend('<i class="fa fa-circle-o"></i> ');
                $menu->item('menu_users')
                    ->add(trans('admin.menu_add_user'), ['route'=>'admin.users.create'])
                    ->prepend('<i class="fa fa-circle-o"></i> ');
            }
            
            if (Gate::allows('UPDATE_CATEGORIES')) {
                $menu->add(trans('admin.menu_categories'), ['class' => 'categories treeview'])
                    ->prepend('<i class="fa fa-list"></i> <span>')
                    ->nickname('menu_categories');
                $menu->item('menu_categories')
                        ->add(trans('admin.all_categories'), ['route' => 'admin.categories.index'])
                    ->prepend('<i class="fa fa-circle-o"></i> ');
                $menu->item('menu_categories')
                    ->add(trans('admin.menu_add_category'), ['route'=>'admin.categories.create'])
                    ->prepend('<i class="fa fa-circle-o"></i> ');
            }

            if (Gate::allows('ADMIN_USERS')) {
                $menu->add(trans('admin.menu_systems'), array('url' => 'admin/translations', 'class' => 'translations'))
                    ->prepend('<i class="fa fa-list-alt"></i> <span>');
            }

        });

        return view('admin.navigation')->with('menu', $menu)->render();
    }

    protected abstract function checkPermission();
}
