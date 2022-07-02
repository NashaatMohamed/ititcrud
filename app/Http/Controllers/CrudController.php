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
        // $phones = phone::where('user_id',Auth::id())->get();
        // $phones = Auth::user()->phones;  // using relation
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
        $request->validate([
            'phone' => 'required|unique:phones|regex:/^(01)[0125][0-9]{8}/|digits:11'
        ]);

        Auth::user()->phones()->create($request->all());
        // $phone = new phone;
        // $phone->phone = $request->phone;
        // $phone->user_id = Auth::id();
        // $phone->save();

        return redirect()->route('crud.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(phone $crud)
    {
        // $phones = phone::find($id);
        if(Auth::id()==$crud->id){
            return $crud->phone;
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
    public function edit(phone $crud)
    {
        // $phones = phone::find($id);
        return view('user.edit',compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, phone $crud)
    {

        $request->validate([
            'phone' => 'required|unique:phones|regex:/^(01)[0125][0-9]{8}/|digits:11'
        ]);

     $this->authorize('update', $crud);
    //  if ($request->user()->cannot('update', $crud)) {
    //     abort(403);
    // }

        // Auth::user()->phones()->update($request->all());
        // $phones = phone::find($id);
        $crud->phone = $request->phone;
        $crud->save();
        return redirect()->route('crud.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(phone $crud)
    {
        // phone::find($id)->delete();
        // phone::destroy($id);
        $crud->delete();
        return redirect()->route('crud.index');
    }
}
