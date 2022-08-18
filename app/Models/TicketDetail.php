<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TicketDetail
 *
 * @property $id
 * @property $ticket_id
 * @property $product_id
 * @property $quantity
 * @property $price
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @property Ticket $ticket
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TicketDetail extends Model
{

    static $rules = [
		'ticket_id' => 'required',
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
    protected $fillable = ['ticket_id','product_id','quantity','price'];


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
    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket', 'id', 'ticket_id');
    }


}
