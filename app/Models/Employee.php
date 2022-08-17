<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 *
 * @property $id
 * @property $full_name
 * @property $dni
 * @property $address
 * @property $workstation
 * @property $age
 * @property $phone
 * @property $contract_start
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property PurchaseOrder[] $purchaseOrders
 * @property Ticket[] $tickets
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employee extends Model
{
    
    static $rules = [
		'full_name' => 'required',
		'dni' => 'required',
		'workstation' => 'required',
		'age' => 'required',
		'contract_start' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['full_name','dni','address','workstation','age','phone','contract_start','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseOrders()
    {
        return $this->hasMany('App\Models\PurchaseOrder', 'employee_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket', 'employee_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
