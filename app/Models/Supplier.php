<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 *
 * @property $id
 * @property $name
 * @property $ruc
 * @property $address
 * @property $phone
 * @property $created_at
 * @property $updated_at
 *
 * @property PurchaseOrder[] $purchaseOrders
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Supplier extends Model
{
    
    static $rules = [
		'name' => 'required',
		'ruc' => 'required',
		'address' => 'required',
		'phone' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','ruc','address','phone'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseOrders()
    {
        return $this->hasMany('App\Models\PurchaseOrder', 'supplier_id', 'id');
    }
    

}
