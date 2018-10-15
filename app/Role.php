<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    /**
     *  Get the user associated with the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    /**
     *  Get the permission associated with the role.
     */
    public function perms()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }


    public static function getAll()
    {
        return self::getNames(self::all());
    }

    public static function getNames($roles)
    {
        if ($roles->isNotEmpty()) {
            $roles->transform(function ($item) {

                $item->name = trans('roles.' . $item->name);

                return $item;
            });
        }

        return $roles;
    }

    /**
     *
     *
     * return boolean
     */
    public function savePermissions($inputPermissions)
    {

        if (!empty($inputPermissions)) {
            $this->perms()->sync($inputPermissions);
        } else {
            $this->perms()->detach();
        }

        return true;
    }
}
