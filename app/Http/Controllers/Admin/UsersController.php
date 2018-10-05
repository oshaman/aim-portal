<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Validation\Rule;

class UsersController extends AdminController
{
    public function __construct()
    {
        $this->jss = '<script>$(function () {$(\'.select2\').select2()})</script>';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission();

        $this->title = trans('admin.users');
        $users = User::with('roles')->paginate(10);

        $this->content = view('admin.users.index')->with(compact('users'))->render();
        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission();

        $this->title = trans('admin.add_user');
        $roles = Role::getAll()->pluck('name', 'id');

        $this->content = view('admin.users.create')->with(compact('roles'))->render();
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkPermission();

        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'roles' => 'nullable|array',
            'roles.*' => 'numeric|between:1,1000'
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        $user->verifyUser();
        $user->setRoles($request->get('roles'));
        return redirect()->route('admin.users.index')->with(['status' => trans('admin.user_created')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->checkPermission();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->checkPermission();

        $roles = Role::getAll()->pluck('name', 'id');

        $availableRoles = $user->roles->pluck('id')->all();

        $this->content = view('admin.users.edit')
                            ->with(compact('availableRoles', 'user', 'roles'))
                            ->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->checkPermission();

        $this->validate($request, [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
                ],
            'password' => 'nullable|string|min:6',
            'roles' => 'nullable|array',
            'roles.*' => 'numeric|between:1,1000'
        ]);

        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->setRoles($request->get('roles'));
        return redirect()->back()->with(['status' => trans('admin.user_updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->checkPermission();

        $result = $user->remove();
        return redirect()->route('admin.users.index')->with($result);
    }

    protected function checkPermission()
    {
        if (Gate::denies('ADMIN_USERS')) {
            abort(404);
        }
    }
}
