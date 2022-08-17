<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'dni', 'address', 'workstation', 'age', 'phone', 'contract_start', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
