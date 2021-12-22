<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\Product\ProductAllResource;
use App\Http\Resources\Product\ProductSingleResource;
use App\Models\Products;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ProductAllResource::collection(Products::whereStatus(1)->paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->success(new ProductSingleResource((new ProductService())->add($request->all())));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $product = Products::find($id);
        if ($product instanceof Products)
            return $this->success(new ProductSingleResource($product));
        return $this->error();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        $product = (new ProductService())->edit($request->all(), $id);
        if ($product != false)
            return $this->success(new ProductSingleResource($product));
        return $this->error();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        if ($product instanceof Products){
            $product->delete();
            return $this->success();
        }
        return $this->error();
    }
}
