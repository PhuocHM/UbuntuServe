<?php

namespace App\Repositories\Hotel\Eloquents;

use App\Repositories\Hotel\Interfaces\StorageInterface;
use App\Models\Hotel\Storage;

class StorageRepository implements StorageInterface
{
    public function all()
    {
        $items = Storage::all();
        return $items;
    }
    public function find($id)
    {
        $item = Storage::find($id);
        return $item;
    }
    public function store($request)
    {
        // 
    }
    public function update($request, $id)
    {
        // 
    }
    public function delete($id)
    {
        // 
    }
}
