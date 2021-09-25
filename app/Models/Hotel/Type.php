<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\Room;

class Type extends Model
{
    use HasFactory;
    protected $table = "room_type";
    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
