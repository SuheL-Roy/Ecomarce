<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
       return view('forntend.ecommarce.index');
    }

    public function products(){
        return view('forntend.ecommarce.products');
     }

     public function product_details(){
        return view('forntend.ecommarce.product_details');
     }

     public function cart(){
        return view('forntend.ecommarce.cart');
     }

     public function checkout(){
        return view('forntend.ecommarce.checkout');
     }

     public function wishlist(){
        return view('forntend.ecommarce.wishlist');
     }

     public function contact(){
        return  view('forntend.ecommarce.contact');
     }
}
