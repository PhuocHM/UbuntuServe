<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\Storage;

class MoneyLog extends Model
{
    use HasFactory;
    protected $table = "moneylog";
    public function storage()
    {
        return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }
}
