<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\Selling;
use App\Models\Hotel\Products;

class SellingDetail extends Model
{
    use HasFactory;
    protected $table = "selling_detail";
    public function selling()
    {
        return $this->belongsTo(Selling::class, 'order_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
