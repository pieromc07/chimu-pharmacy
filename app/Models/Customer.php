<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'address', 'gender', 'phone', 'dni', 'ruc'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
