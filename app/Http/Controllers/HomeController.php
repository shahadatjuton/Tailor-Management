<?php

namespace App\Http\Controllers;

use App\Dress;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dresses = Dress::where('status',1)->latest()->get();
        return view('welcome',compact('dresses'));
    }

    public function showDress($id){
        $dress = Dress::find($id);
        return view('dress.viewDress',compact('dress'));
    }


}
