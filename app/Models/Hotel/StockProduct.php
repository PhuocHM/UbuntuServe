<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\SupplierProduct;
use App\Models\Hotel\Storage;

class StockProduct extends Model
{
    use HasFactory;
    protected $table = "stock_product";
    public function supplier_product()
    {
        return $this->belongsTo(SupplierProduct::class, 'product_id', 'id');
    }
    public function storage()
    {
        return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }
}
