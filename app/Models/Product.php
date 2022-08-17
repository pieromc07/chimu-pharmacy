<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sale_price', 'purchase_price', 'expiration_date', 'stock', 'category_id', 'filing_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function filing()
    {
        return $this->belongsTo(Filing::class);
    }

    public function ticketDetails()
    {
        return $this->hasMany(TicketDetail::class);
    }

    public function purchaseOrderDetails()
    {
        return $this->hasMany(PurchaseOrderDetail::class);
    }
}
