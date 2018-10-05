<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email_token', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function canDo($permission, $require = FALSE)
    {
        if(is_array($permission)) {
            foreach($permission as $permName) {

                $permName = $this->canDo($permName);
                if($permName && !$require) {
                    return TRUE;
                }
                else if(!$permName && $require) {
                    return FALSE;
                }
            }
            return  $require;
        }
        else {
            foreach($this->roles as $role) {
                foreach($role->perms as $perm) {
                    if(str_is($permission,$perm->name)) {
                        return TRUE;
                    }
                }
            }
        }
    }
    // string  ['role1', 'role2']
    public function hasRole($name, $require = false)
    {
        if (is_array($name)) {
            foreach ($name as $roleName) {
                $hasRole = $this->hasRole($roleName);
                if ($hasRole && !$require) {
                    return true;
                } elseif (!$hasRole && $require) {
                    return false;
                }
            }
            return $require;
        } else {
            foreach ($this->roles as $role) {
                if ($role->name == $name) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);

        $this->save();
    }

    public function remove()
    {

        if(auth()->user()->id === $this->id){
            return ['status' => trans('admin.self_delete')];
        }

        $this->delete();
        return ['status' => trans('admin.user_deleted')];
    }

    public function verifyUser()
    {
        $this->verified = 1;
        $this->save();
    }

    public function setRoles($ids)
    {
//        if($ids == null){return;}

        $this->roles()->sync($ids);
    }

    public function generatePassword($password)
    {
        if($password != null)
        {
            $this->password = Hash::make($password);
            $this->save();
        }
    }
}
