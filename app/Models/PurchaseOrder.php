<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseOrder
 *
 * @property $id
 * @property $purcahse_order_number
 * @property $date
 * @property $total
 * @property $status
 * @property $supplier_id
 * @property $employee_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @property PurchaseOrderDetail[] $purchaseOrderDetails
 * @property Supplier $supplier
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PurchaseOrder extends Model
{
    
    static $rules = [
		'purcahse_order_number' => 'required',
		'date' => 'required',
		'total' => 'required',
		'status' => 'required',
		'supplier_id' => 'required',
		'employee_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['purcahse_order_number','date','total','status','supplier_id','employee_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseOrderDetails()
    {
        return $this->hasMany('App\Models\PurchaseOrderDetail', 'purchase_order_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supplier()
    {
        return $this->hasOne('App\Models\Supplier', 'id', 'supplier_id');
    }
    

}
