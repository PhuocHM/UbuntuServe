<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\Storage;

class MoneyLog extends Model
{
    use HasFactory;
    protected $table = "moneylog";
    protected $fillable = [
        "storage_name", "years", "month", "money_before", "earn", "spend", "total"
    ];
    public function storage()
    {
        return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }
}
