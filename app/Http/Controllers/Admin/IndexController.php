<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Gate;

class IndexController extends AdminController
{
    public function show()
    {
        $this->checkPermission();

        $this->title = trans('admin.admin');
        $this->breadcrumb = 'admin.index';
        $users = User::all();
        $this->content = view('admin.main')->with(compact('users'))->render();
        return $this->renderOutput();
    }

    protected function checkPermission()
    {
        if (Gate::denies('VIEW_ADMIN')) {
            abort(404);
        }
    }
}
