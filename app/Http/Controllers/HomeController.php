<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dress;
use App\Setting;
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
        $sliders = Setting::where('status',1)->latest()->get();
        $dresses = Dress::where('status',1)->latest()->get();
        $count = Category::latest()->get()->count();
        if ($count > 5)
        {
            $categories = Category::latest()->take(5)->get();
        }else{
           $categories = Category::latest()->get();
       }

        return view('welcome',compact('dresses','categories','sliders'));
    }

    public function categoryWiseDress($category){
        $category = $category;
        $dresses = Dress::where('category',$category)->latest()->get();
        $categories = Category::latest()->get();
        return view('CategoryWiseDress',compact('dresses','categories','category'));
    }

    public function showDress($id){
        $dress = Dress::find($id);
        return view('dress.viewDress',compact('dress'));
    }


    public function payment(){
        return view('test');

    }
    public  function storePayment(){
        return "okay";

        require 'vendor/autoload.php';
        \Stripe\Stripe::setApiKey('sk_test_51HgPI5FDuGHSpFLnoOntYhXp5WqtgT1CFZ34G2CAKeXE0OvwQ7rN8ajAdeO6ewxH5f579vjqOpsEqMmVxTQOqJ3Q00YHX94oqg');
        header('Content-Type: application/json');
        $YOUR_DOMAIN = 'http://localhost:4242';
        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => 2000,
                    'product_data' => [
                        'name' => 'Stubborn Attachments',
                        'images' => ["https://i.imgur.com/EHyR2nP.png"],
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . '/success.html',
            'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
        ]);
        echo json_encode(['id' => $checkout_session->id]);
    }

}
