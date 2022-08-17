<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 *
 * @property $id
 * @property $full_name
 * @property $address
 * @property $gender
 * @property $phone
 * @property $dni
 * @property $ruc
 * @property $created_at
 * @property $updated_at
 *
 * @property Ticket[] $tickets
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Customer extends Model
{
    
    static $rules = [
		'full_name' => 'required',
		'address' => 'required',
		'gender' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['full_name','address','gender','phone','dni','ruc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'customer_id', 'id');
    }
    

}
