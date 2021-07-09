<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application's login form.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('dashboard.client.index', \App\Services\BuildParams::client($request->user()));
    }
}
