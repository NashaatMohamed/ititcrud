<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(){
        return "create route";
    }

    public function retrive($id){
        return $id;
    }
}
