<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 *
 * @property $id
 * @property $ticket_number
 * @property $date
 * @property $total
 * @property $discount
 * @property $employee_id
 * @property $customer_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Customer $customer
 * @property Employee $employee
 * @property TicketDetail[] $ticketDetails
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ticket extends Model
{

    static $rules = [
		'ticket_number' => 'required',
		'date' => 'required',
		'total' => 'required',
		'discount' => 'required',
		'employee_id' => 'required',
		'customer_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ticket_number','date','total','discount','employee_id','customer_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }

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
    public function ticketDetails()
    {
        return $this->hasMany('App\Models\TicketDetail', 'ticket_id', 'id');
    }


}
