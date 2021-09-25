<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\Room;

class Floor extends Model
{
    use HasFactory;
    protected $table = "floor";
    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
