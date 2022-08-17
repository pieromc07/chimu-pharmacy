<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseOrderDetail
 *
 * @property $id
 * @property $purchase_order_id
 * @property $product_id
 * @property $quantity
 * @property $price
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @property PurchaseOrder $purchaseOrder
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PurchaseOrderDetail extends Model
{
    
    static $rules = [
		'purchase_order_id' => 'required',
		'product_id' => 'required',
		'quantity' => 'required',
		'price' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['purchase_order_id','product_id','quantity','price'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function purchaseOrder()
    {
        return $this->hasOne('App\Models\PurchaseOrder', 'id', 'purchase_order_id');
    }
    

}
