<?php

namespace App\Imports;

use App\Models\Hotel\MoneyLog;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new MoneyLog([
            "storage_name" => $row[0],
            "years" => $row[1],
            "month" => $row[2],
            "money_before" => $row[3],
            "earn" => $row[4],
            "spend" => $row[5],
            "total" => $row[6],
        ]);
    }
}
