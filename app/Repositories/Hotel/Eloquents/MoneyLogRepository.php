<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\MoneyLogInterface;
use App\Models\Hotel\MoneyLog;

class MoneyLogRepository implements MoneyLogInterface
{
    public function all()
    {
        $items = MoneyLog::all();
        return $items;
    }
    public function find($id)
    {
        $item = MoneyLog::find($id);
        return $item;
    }
    public function store($request)
    {
        $moneylog = new MoneyLog;
        $moneylog->storage_id = $request->storage_id;
        $moneylog->money_before = $request->money_before;
        $moneylog->earn = $request->earn;
        $moneylog->spend = $request->spend;
        $moneylog->total = $request->total_money;
        $moneylog->save();
        return $moneylog;
    }
    public function update($request, $id)
    {
        $moneylog = MoneyLog::find($id);
        $moneylog->storage_id = $request->edit_storage_id;
        $moneylog->money_before = $request->edit_money_before;
        $moneylog->earn = $request->edit_earn;
        $moneylog->spend = $request->edit_spend;
        $moneylog->total = $request->edit_total_money;
        $moneylog->save();
        return $moneylog;
    }
    public function delete($id)
    {
        $moneylog = MoneyLog::find($id);
        $moneylog->delete();
        return $moneylog;
    }
}
