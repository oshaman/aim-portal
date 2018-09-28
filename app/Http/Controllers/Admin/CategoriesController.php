<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Rules\CategoryKeys;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Validation\Rule;

class CategoriesController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission();

        $this->title = trans('admin.menu_categories');
        $categories = Category::paginate(10);
        $this->content = view('admin.categories.index')->with(compact('categories'))->render();
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

        $this->title = trans('admin.create_category');
        $categories = Category::getAll()->pluck('name', 'id');

        $this->content = view('admin.categories.create')->with(compact('categories'))->render();
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
            'parent_id' => 'nullable|number|between:1,1000',
            'slug' => ['required', 'between:4,255', 'regex:#^[\w-]#', 'unique:categories,slug'],
            'properties' => [
                'required',
                'array',
                'size:2',
                new CategoryKeys
            ],
            'properties.*.name' => 'required|string|between:4,255',
            'approved' => 'boolean|nullable',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:1024',
            'imgalt' => ['string', 'nullable', 'max:255'],
            'imgtitle' => ['string', 'nullable', 'max:255'],
        ]);

        dd($request->all());

        $category = Category::add($request->all());
        $category->toggleStatus($request->get('approved'));
        $category->setProperties($request->get('properties'));

        return redirect()->route('categories.index')->with(['status' => trans('admin.category_created')]);
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
    public function edit($id)
    {
        $this->checkPermission();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkPermission();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkPermission();

    }

    protected function checkPermission()
    {
        if (Gate::denies('UPDATE_CATEGORIES')) {
            abort(404);
        }
    }
}
