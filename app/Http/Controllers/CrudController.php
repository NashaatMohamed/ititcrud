<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\phone;
use Illuminate\Support\Facades\Auth;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = phone::all();
        return view('user.index',compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $phone = new phone;
        $phone->phone = $request->phone;
        $phone->user_id = Auth::id();
        $phone->save();

        return redirect()->route('crud.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phones = phone::find($id);
        if(Auth::id()==$phones->id){
            return $phones->phone;
        }else{
            return "no phone for this user here";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phones = phone::find($id);
        return view('user.edit',compact('phones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $phones = phone::find($id);
        $phones->phone = $request->phone;
        $phones->save();
        return redirect()->route('crud.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        phone::find($id)->delete();
        return redirect()->route('crud.index');
    }
}
