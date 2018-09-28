<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Category extends Model
{
    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;
    protected $fillable = ['parent_id', 'slug'];

    public function propertie()
    {
        return $this->hasMany(CategoryProperty::class, 'category_id');
    }

    public function mainProperties()
    {
        return $this->hasMany(CategoryProperty::class, 'category_id')->where('locale', app()->getLocale());
    }

    public function image()
    {
        return $this->hasOne(CategoryImage::class);
    }

    public static function add($fields)
    {
        $category = new static;
        $category->fill($fields);
        $category->save();

        return $category;
    }

    public function setProperties($properties)
    {
        foreach ($properties as $locale => $name) {
            $this->propertie()->create([
                'locale' => $locale,
                'name' => $name->name,
            ]);
        }
    }

    public function setDraft()
    {
        $this->approved = Category::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->approved = Category::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value == null) {
            return $this->setDraft();
        }

        return $this->setPublic();
    }

    public function removeImage()
    {
        if (!empty($this->image->path)) {
            Storage::delete('uploads/categories/' . $this->image->path);
        }
    }

    public function uploadImage($request)
    {
        $image = $request->file('image');
        if (null == $image) {
            return;
        }

        $this->removeImage();
        $filename = str_random(10) . time() . '.' . $image->extension();
        $image->storeAs('uploads/categories', $filename);
        $this->image->save(
            [
                'path'=>$filename,
                'alt'=>$request->get('alt'),
                'title'=>$request->get('title'),
            ]
        );
    }

    public function getImage()
    {
        if ($this->image->path == null) {
            return '/img/no-image.png';
        }

        return '/uploads/categories/' . $this->image->path;
    }

    public static function getAll()
    {
        $categories = self::with('mainProperties')->get();
        $categories->transform(function($item) {

            $item->name = $item->mainProperties->name;

            return $item;
        });
        return $categories;
    }
}
