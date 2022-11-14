<?php

namespace App\Http\Controllers;

use App\Models\color;
use App\Models\MainCategory;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
   public function index()
   {
      return view('forntend.ecommarce.index');
   }

   public function latest_product_json(Request $request)
   {
      $collection = Product::with(['Main_category', 'category', 'sub_category', 'color', 'image', 'Publication', 'Size', 'Unit', 'Vendor', 'Writer'])
         ->orderBy('id', 'DESC')->paginate(9);
      return $collection;
   }

   
   public function search_product_json(Request $request, $limit, $key)
   {
      $collection = Product::where('name', $key)
         ->orWhere('code', $key)
         ->orWhere('price', $key)
         ->orWhere('discount_price', $key)
         ->orWhere('name', 'LIKE', '%' . $key . '%')
         ->with(['Main_category', 'category', 'sub_category', 'color', 'image', 'Publication', 'Size', 'Unit', 'Vendor', 'Writer'])
         ->orderBy('id', 'DESC')->paginate($limit);
      return $collection;
   }


   public $main_category_id, $category_id;
   public function main_category_products_json(Request $request,$main_category){
      $main_category = MainCategory::where('slug', $main_category)->first();

      if ($main_category) {
          $this->main_category_id = $main_category->id;
          if ($request->has('range')) {
              $range = str_replace('$', '', $request->range);
              $range = explode('-', $range);
              $min = (int) $range[0];
              $max = (int) $range[1];
              $products = $main_category->related_product()->whereBetween('price', [$min, $max])->with([
                  'category',
                  'sub_category',
                  'main_category',
                  'color',
                  'image',
                  'publication',
                  'size',
                  'unit',
                  'writer',
              ])->orderBy('price', 'DESC')->paginate(10);
          }
          else if($request->has('size')){
              $this->size = (int) $request->size;
              $products = $main_category->related_product()->with([
                  'category',
                  'sub_category',
                  'main_category',
                  'color',
                  'image',
                  'publication',
                  'size',
                  'unit',
                  'writer',
              ])->whereExists(function ($query) {
                  $query->select(DB::raw(1))
                      ->from('product_size')
                      ->whereRaw('product_size.product_id = products.id')
                      ->where('product_size.size_id',$this->size);
              })->orderBy('id', 'DESC')->paginate(10);

          }
          else if($request->has('color')){
              $this->color = (int) $request->color;
              $products = $main_category->related_product()->with([
                  'category',
                  'sub_category',
                  'main_category',
                  'color',
                  'image',
                  'publication',
                  'size',
                  'unit',
                  'writer',
              ])->whereExists(function ($query) {
                  $query->select(DB::raw(1))
                      ->from('color_product')
                      ->whereRaw('color_product.product_id = products.id')
                      ->where('color_product.color_id',$this->color);
              })->orderBy('id', 'DESC')->paginate(10);
          }
          else {
              $products = $main_category->related_product()->with([
                  'category',
                  'sub_category',
                  'main_category',
                  'color',
                  'image',
                  'publication',
                  'size',
                  'unit',
                  'writer',
              ])->orderBy('id', 'DESC')->paginate(8);

              $sizes = Size::where('status',1)->select(['name','id'])->get();
              foreach ($sizes as $key => $item) {
                  $count = $item->related_product()->whereExists(function ($query) {
                                  $query->select(DB::raw(1))
                                      ->from('main_category_product')
                                      ->whereRaw('main_category_product.product_id = products.id')
                                      ->where('main_category_product.main_category_id',$this->main_category_id);
                              })->count();
                  $item->product_amount = $count;
              }

              $colors = color::where('status',1)->select(['name','id'])->get();
              foreach ($colors as $key => $item) {
                  $count = $item->related_product()->whereExists(function ($query) {
                                  $query->select(DB::raw(1))
                                      ->from('main_category_product')
                                      ->whereRaw('main_category_product.product_id = products.id')
                                      ->where('main_category_product.main_category_id',$this->main_category_id);
                              })->count();
                  $item->product_amount = $count;
              }

              return response()->json([
                  'products' => $products,
                  'sizes' => $sizes,
                  'colors' => $colors,
              ]);
          }
          return $products;
      } else {
          return [];
      }
      
   }

   public function vue()
   {
      return view('learn-vue');
   }

   public function products()
   {
      return view('forntend.ecommarce.products');
   }

   public function main_category_products(){
      return view('forntend.ecommarce.products');
   }
   public function category_products(){
      return view('forntend.ecommarce.products');
   }

   public function sub_category_products(){
      return view('forntend.ecommarce.products');
   }

   public function product_details(Product $product)
   {
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
      return view('forntend.ecommarce.product_details', compact('product'));
   }

   public function cart()
   {
      return view('forntend.ecommarce.cart');
   }

   public function checkout()
   {
      return view('forntend.ecommarce.checkout');
   }

   public function wishlist()
   {
      return view('forntend.ecommarce.wishlist');
   }

   public function contact()
   {
      return  view('forntend.ecommarce.contact');
   }

   public function  CheckoutConfirm()
   {
    
      // \Stripe\Stripe::setApiKey('sk_test_51LyIIcSEDmb2ml08OFS6DBtKzPGHyP2J7f2Gb87WRMHqVk9MjMPChO58GSNuD2AxVc9w56JdpDa6dXURjlAPCZzD00RjWO0mVn');
      // header('Content-Type: application/json');
      // $YOUR_DOMAIN = 'http://127.0.0.1:8000';
      // $checkout_session = \Stripe\Checkout\Session::create([
      //     'payment_method_types' => ['card'],
      //     'line_items' => [[
      //         'price_data' => [
      //             'currency' => 'usd',
      //             'unit_amount' => 2000,
      //             'product_data' => [
      //                 'name' => 'Stubborn Attachments',
      //                 'images' => ["https://i.imgur.com/EHyR2nP.png"]
      //             ],
      //         ],
      //         'quantity' => 1,
      //     ]],
      //     'mode' => 'payment',
      //     'success_url' => $YOUR_DOMAIN . '/checkout_success',
      //     'cancel_url' => $YOUR_DOMAIN . '/check-out',
      // ]);
      // echo json_encode(['id' => $checkout_session->id]);
      \Stripe\Stripe::setApiKey('sk_test_51LyIIcSEDmb2ml08OFS6DBtKzPGHyP2J7f2Gb87WRMHqVk9MjMPChO58GSNuD2AxVc9w56JdpDa6dXURjlAPCZzD00RjWO0mVn');
      header('Content-Type: application/json');
      $YOUR_DOMAIN = 'http://127.0.0.1:8000';
      $orders = Order::where('user_id',Auth::user()->id)->orderBy('id','DESC')->with('order_products')->first();
      $lineItems= [];
       foreach ($orders->order_products as $order) {
         $lineItems[] = [
             'price_data' => [
                 'currency' => 'usd',
                 'product_data' => [
                     'name' => $order->product_name,
                     'images' => ["payment"],
                 ],
                 'unit_amount' => $order->price * 100,
             ],
             'quantity' => $order->qty,
         ];
     }
      $checkout_session = \Stripe\Checkout\Session::create([
         //  'payment_method_types' => ['card'],
         //  'line_items' => [[
         //      'price_data' => [
         //          'currency' => 'usd',
         //          'unit_amount' => 2000,
         //          'product_data' => [
         //              'name' => 'Stubborn Attachments',
         //              'images' => ["https://i.imgur.com/EHyR2nP.png"]
         //          ],
         //      ],
         //      'quantity' => 1,
         //  ]],
         'line_items'=>$lineItems,
          'mode' => 'payment',
          'success_url' => $YOUR_DOMAIN . '/checkout_success',
          'cancel_url' => $YOUR_DOMAIN . '/check-out',
      ]);
      echo json_encode(['id' => $checkout_session->id]);
   }

   public function CheckOutSuccess(){
      
     
      return  view('forntend.ecommarce.invoice');
   }


   public function allCategory(){
   //   $all_category = MainCategory::orderBy('sequence','ASC')->with('related_categories')->get();  

   //   return $all_category;
     $category = MainCategory::where('status', 1)->with('related_categories')->withCount('related_product')->get();
     return $category;

    // return view('forntend.ecommarce.layouts.menu_sidebar',compact('all_category'));
   }
  
}
