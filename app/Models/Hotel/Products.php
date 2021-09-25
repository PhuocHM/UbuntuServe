<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\SellingDetail;
use App\Models\Hotel\Supplier;
use App\Models\Hotel\Storage;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    public function sellingDetail()
    {
        return $this->hasMany(SellingDetail::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    public function storage()
    {
        return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }
}
