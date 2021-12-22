<?php

namespace App\Http\Controllers;


use App\Http\Requests\Shop\StoreRequest;
use App\Http\Requests\Shop\UpdateRequest;
use App\Http\Resources\Shop\ShopAllResource;
use App\Http\Resources\Shop\ShopSingleResource;
use App\Models\Shop;
use App\Services\ShopService;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ShopAllResource::collection(Shop::whereStatus(1)->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        return $this->success(new ShopSingleResource((new ShopService())->add($request->all())));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $shop = Shop::find($id);
        if ($shop instanceof Shop)
            return $this->success(new ShopSingleResource($shop));
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
        $shop = (new ShopService())->edit($request->all(), $id);
        if ($shop != false)
            return $this->success(new ShopSingleResource($shop));
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
        $shop = Shop::find($id);
        if ($shop instanceof Shop){
            $shop->delete();
            return $this->success();
        }
        return $this->error();
    }
}
