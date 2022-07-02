<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\phone;
use App\models\User;
use Illuminate\Http\Request;
use App\Http\Resources\phoneResource;
use App\Http\Resources\phoneCollection;
use Auth;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return  phoneResource::collection(phone::limit(2)->paginate());
        return new phoneCollection(phone::limit(2)->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phone = Auth::user()->phones()->create($request->all());
        return new phoneResource($phone);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(phone $phone)
    {
        return new phoneResource($phone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, phone $phone)
    {
        $phone->update($request->all());
        return new phoneResource($phone);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(phone $phone)
    {
        //
    }
}
