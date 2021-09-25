<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\SellingDetail;
use App\Models\Hotel\Room;
use App\Models\Hotel\Storage;
use App\Models\Hotel\Employee;
use App\Models\User;

class Selling extends Model
{
    use HasFactory;
    protected $table = "selling";
    public function sellingDetail()
    {
        return $this->hasMany(SellingDetail::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
    public function storage()
    {
        return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }
    // public function employee()
    // {
    //     return $this->belongsTo(Employee::class, 'employee_id', 'id');
    // }
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
