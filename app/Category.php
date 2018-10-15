<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use App\Traits\ContentsHandler;

class Category extends Model
{
    use ContentsHandler;

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;
    protected $fillable = ['slug'];

    public function property()
    {
        return $this->hasMany(CategoryProperty::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
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

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function setProperties($properties)
    {
        foreach ($properties as $locale => $name) {
            $this->property()->updateOrCreate(
                ['locale' => $locale,],
                ['name' => $name['name'],]
            );
        }
    }

    public function setParent($id)
    {
        $this->parent_id = $id;
        $this->save();
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
            Storage::disk('public')->delete('categories/' . $this->image->path);
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
            ['category_id' => $this->id],
            [
                'path' => $filename,
                'imgalt' => $request->get('imgalt'),
                'imgtitle' => $request->get('imgtitle'),
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

        $categories = self::getNames($categories);

        return $categories;
    }

    public static function getAvailable($category)
    {
        $categories = self::whereApproved(1)
            ->where('id', '<>', $category->id)
            ->whereNotIn('id', $category->children->pluck('id')->toArray())
            ->with('property')
            ->get();

        $categories = self::getNames($categories);

        return $categories;
    }

    public static function getNames($categories)
    {
        if ($categories->isNotEmpty()) {
            $categories->transform(function ($item) {

                $item->name = $item->mainProperties->name;

                return $item;
            });
        }

        return $categories;
    }

    public function getMainPropertiesAttribute()
    {
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

    public function getChildrenIds()
    {
        return $this->children->pluck(['id'])->all();
    }

    public static function getMain()
    {
        return self::with('image')->whereNull('parent_id')->orderBy('id', 'desc')->paginate(10);
    }
}
