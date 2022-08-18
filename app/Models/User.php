<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

/**
 * Class User
 *
 * @property $id
 * @property $level
 * @property $username
 * @property $password
 * @property $is_active
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee[] $employees
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{

    static $rules = [
        'level' => 'required',
        'username' => 'required',
        'password' => 'required',
        'is_active' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['level', 'username', 'password', 'is_active'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'user_id', 'id');
    }

    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc()
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        if ($employee->full_name != null) {
            return $employee->full_name;
        } else {
            return $user->username;
        }
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }
}
