<?php

namespace App\Services;

use App\Models\Products;

class ProductService
{
    public function add($params){
        return Products::create([
            'name' => $params['name'],
            'price' => $params['price'],
            'shop_id' => $params['shop_id'],
            'description' => $params['description'],
            'status' => $params['status'],
        ]);
    }
    public function edit($params, $id){
        $product = Products::find($id);
        if ($product instanceof Products){
            $product->update([
                'name' => $params['name'],
                'price' => $params['price'],
                'shop_id' => $params['shop_id'],
                'description' => $params['description'],
                'status' => $params['status'],
            ]);
            return $product;
        }
        return false;
    }
}
