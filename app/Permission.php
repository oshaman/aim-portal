<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name'];

    public static function getPerms()
    {
        $permissions = self::all();
        $permissions->transform(function($item) {

            $item->name = trans('permissions.'.$item->name);

            return $item;
        });
        return $permissions;
    }



}
