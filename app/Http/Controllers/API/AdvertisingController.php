<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisingController\StoreRequest;
use App\Http\Requests\AdvertisingController\UpdateRequest;
use App\Http\Resources\API\AdvertisingResource;
use App\Models\Advertising;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AdvertisingResource::collection(Advertising::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        // loop throw all images and upload them
        $data['images'] = array_map(function ($file) {
            return $this->uploadFile($file, 'advertising');
        }, $data['images']) ?? [];

        // get daily budget by get total and get diff betwen start date and en date
        $data['daily_budget'] = round(($data['total'] / Carbon::parse($data['from'])->diffInDays($data['to'])), 2);

        $advertising = Advertising::create($data);

        //after create adv return it
        return new AdvertisingResource($advertising);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Advertising $advertising)
    {
        return new AdvertisingResource($advertising);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Advertising $advertising)
    {
        $data = $request->validated();
        if (isset($data['images'])) {
            $images = array_map(function ($file) {
                return $this->uploadFile($file, 'advertising');
            }, $data['images']) ?? [];
            $data['images'] = array_merge($advertising->images, $images);
        }
        $data['daily_budget'] = round(($data['total'] / Carbon::parse($data['from'])->diffInDays($data['to'])), 2);
        $advertising->update($data);
        return new AdvertisingResource($advertising);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertising $advertising)
    {
        $advertising->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }
}
