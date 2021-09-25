<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\Floor;
use App\Models\Hotel\Type;
use App\Models\Hotel\Booking;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';
    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor', 'id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'room_type', 'id');
    }
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
