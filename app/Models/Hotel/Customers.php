<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\Booking;

class Customers extends Model
{
    use HasFactory;
    protected $table = "customer";
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
