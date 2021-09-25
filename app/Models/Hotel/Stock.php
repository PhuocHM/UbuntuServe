<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Hotel\Supplier;
use App\Models\Hotel\Storage;

class Stock extends Model
{
    use HasFactory;
    protected $table = "stock";
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    public function storage()
    {
        return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
