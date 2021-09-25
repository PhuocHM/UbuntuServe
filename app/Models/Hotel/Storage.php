<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel\MoneyLog;

class Storage extends Model
{
    use HasFactory;
    protected $table = 'storage';
    public function moneyLog()
    {
        return $this->hasMany(MoneyLog::class);
    }
}
