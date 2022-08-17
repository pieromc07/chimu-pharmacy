<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_number', 'date', 'total', 'discount', 'employee_id', 'customer_id'];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function ticketDetails()
    {
        return $this->hasMany(TicketDetail::class);
    }
}
