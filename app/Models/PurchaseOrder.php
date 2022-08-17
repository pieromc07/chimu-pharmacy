<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = ['purcahse_order_number', 'date', 'total', 'status', 'supplier_id', 'employee_id'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function purchaseOrderDetails()
    {
        return $this->hasMany(PurchaseOrderDetail::class);
    }
}
