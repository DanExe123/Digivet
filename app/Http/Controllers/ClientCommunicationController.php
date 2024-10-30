<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientCommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ClientCommunication.Communication');
    }


    /**
     * chatbox
     */
    public function message(Request $request)
    {
        return  [];
    }
}
