<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Category extends Model
{
    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;
    protected $fillable = ['parent_id', 'slug'];

    public function property()
    {
        return $this->hasMany(CategoryProperty::class, 'category_id');
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
            $this->property()->create([
                'locale' => $locale,
                'name' => $name['name'],
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
            Storage::disc('public')->delete('categories/' . $this->image->path);
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
        $image->storeAs('categories', $filename, 'public');
        $this->image()->updateOrCreate(
            [
                'path'=>$filename,
                'imgalt'=>$request->get('imgalt'),
                'imgtitle'=>$request->get('imgtitle'),
            ]
        );
    }

    public function getImage()
    {
        if (empty($this->image->path)) {
            return config('settings.no_image');
        }

        return '/uploads/categories/' . $this->image->path;
    }

    public static function getAll()
    {
        $categories = self::whereApproved(1)->with('property')->get();
        $categories->transform(function($item) {

            $item->name = $item->mainProperties->name;

            return $item;
        });

        return $categories;
    }

    public function getMainPropertiesAttribute() {
        return $this->property()->where('locale', app()->getLocale())->first();
    }

    public function getUkPropertiesAttribute()
    {
        return $this->property()->where('locale', 'uk')->first();
    }

    public function getRuPropertiesAttribute()
    {
        return $this->property()->where('locale', 'ru')->first();
    }

}
