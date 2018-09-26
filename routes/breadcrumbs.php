<?php

// Home
Breadcrumbs::for ('admin.index', function ($trail) {
    $trail->push('Admin - Home', route('admin.index'));
});

Breadcrumbs::for ('admin.users.index', function ($trail) {
    $trail->parent('admin.index');
    $trail->push(trans('admin.menu_users'), route('admin.users.index'));
});

Breadcrumbs::for ('admin.users.create', function ($trail) {
    $trail->parent('admin.users.index');
    $trail->push(trans('admin.menu_add_user'), route('admin.users.create'));
});

Breadcrumbs::for ('admin.users.edit', function ($trail, $user) {
    $trail->parent('admin.users.index');
    $trail->push(trans('admin.user_edit'), route('admin.users.edit', $user->id));
});

//----------------------------------------------------------
Breadcrumbs::for ('admin.categories.index', function ($trail) {
    $trail->parent('admin.index');
    $trail->push(trans('admin.menu_categories'), route('admin.categories.index'));
});

Breadcrumbs::for ('admin.categories.create', function ($trail) {
    $trail->parent('admin.categories.index');
    $trail->push(trans('admin.menu_add_category'), route('admin.categories.create'));
});

Breadcrumbs::for ('admin.categories.edit', function ($trail, $user) {
    $trail->parent('admin.categories.index');
    $trail->push(trans('admin.category_edit'), route('admin.categories.edit', $user->id));
});
//----------------------------------------------------------



Breadcrumbs::for ('translations', function ($trail) {
    $trail->parent('admin.index');
    $trail->push(trans('admin.menu_systems'), url('admin/translations'));
});


/*Breadcrumbs::for ('category', function ($trail, $category) {
    if ($category->parent) {
        $trail->parent('category', $category->parent);
    }
    $trail->push($category->name, $category->parent);
});

Breadcrumbs::for ('service', function ($trail, $service) {
    $trail->parent('category', $service->category);
    $trail->push($service->name, url('service'));
});*/