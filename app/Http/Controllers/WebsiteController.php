<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
       return view('forntend.ecommarce.index');
    }

   public function latest_product_json(Request $request){
      $collection = Product::with(['Main_category','category','sub_category','color','image','Publication','Size','Unit','Vendor','Writer'])
      ->orderBy('id','DESC')->paginate(9); 
      return $collection;
   }

   public function search_product_json(Request $request,$limit,$key){
      $collection = Product::where('name',$key)
      ->orWhere('code',$key)
      ->orWhere('price',$key)
      ->orWhere('discount_price',$key)
      ->orWhere('name','LIKE','%' . $key . '%')
      ->with(['Main_category','category','sub_category','color','image','Publication','Size','Unit','Vendor','Writer'])
      ->orderBy('id','DESC')->paginate($limit);
      return $collection;
   }

    public function vue(){
      return view('learn-vue');
    }

    public function products(){
        return view('forntend.ecommarce.products');
     }

     public function product_details(Product $product){
      $product['discount'] = HelperController::discount_price($product->price, $product->discount_price, $product->expiration_date);
      $product['image'] = $product->image()->get();
      $product['category'] = $product->category()->get();
      $product['sub_category'] = $product->sub_category()->get();
      $product['main_category'] = $product->Main_category()->get();
      $product['color'] = $product->color()->get();
      $product['publication'] = $product->Publication()->get();
      $product['size'] = $product->Size()->get();
      $product['unit'] = $product->Unit()->get();
      $product['vendor'] = $product->Vendor()->get();
      $product['writer'] = $product->Writer()->get();
      //echo $product->discount;
      //return $product;
      return view('forntend.ecommarce.product_details',compact('product'));
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
