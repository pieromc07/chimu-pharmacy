<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $name
 * @property $sale_price
 * @property $purchase_price
 * @property $expiration_date
 * @property $stock
 * @property $category_id
 * @property $filing_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property Filing $filing
 * @property PurchaseOrderDetail[] $purchaseOrderDetails
 * @property TicketDetail[] $ticketDetails
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    static $rules = [
		'name' => 'required',
		'sale_price' => 'required',
		'purchase_price' => 'required',
		'expiration_date' => 'required',
		'stock' => 'required',
		'category_id' => 'required',
		'filing_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','sale_price','purchase_price','expiration_date','stock','category_id','filing_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function filing()
    {
        return $this->hasOne('App\Models\Filing', 'id', 'filing_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseOrderDetails()
    {
        return $this->hasMany('App\Models\PurchaseOrderDetail', 'product_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketDetails()
    {
        return $this->hasMany('App\Models\TicketDetail', 'product_id', 'id');
    }
    

}
