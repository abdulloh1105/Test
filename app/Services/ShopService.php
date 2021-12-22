<?php

namespace App\Services;

use App\Models\Shop;

class ShopService
{
    public function add($params)
    {
        return Shop::create([
            'name' => $params['name'],
            'description' => $params['description'],
            'status' => $params['status'],
        ]);
    }

    public function edit($params, $id)
    {
        $shop = Shop::find($id);
        if ($shop instanceof Shop) {
            $shop->name = $params['name'];
            $shop->description = $params['description'];
            $shop->status = $params['status'];
            $shop->update();
            return $shop;
        }
        return false;
    }
}
