<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\Room;
use App\Models\Hotel\Customers;

class Booking extends Model
{
    use HasFactory;
    protected $table = "booking";
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
