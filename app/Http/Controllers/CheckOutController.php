<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Billing;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function check_out_info(Request $request)
    {
        if (Address::where('user_id', Auth::user()->id)->exists()) {
            $address = Address::where('user_id', Auth::user()->id)->first();
        } else {
            $address = new Address();
        }
        $req_billing_address = (object) $request->billing_address;
        $address->user_id = Auth::user()->id;
        $address->address1 = $req_billing_address->address;
        $address->address2 = $req_billing_address->address2;
        $address->country_name = $req_billing_address->state;
        $address->city_name = $req_billing_address->town;
        $address->phone = $req_billing_address->phone;
        $address->comment = $req_billing_address->order_notes;
        $address->created_at = Carbon::now()->toDateTimeString();
        $address->save();



        if (Billing::where('user_id', Auth::user()->id)->exists()) {
            $billing_address = Billing::where('user_id', Auth::user()->id)->first();
        } else {
            $billing_address = new Billing();
        }
        $billing_address->user_id = Auth::user()->id;
        $billing_address->address1 = $req_billing_address->address;
        $billing_address->address2 = $req_billing_address->address2;
        $billing_address->city = $req_billing_address->town;
        $billing_address->phone = $req_billing_address->phone;
        $billing_address->mobile = $req_billing_address->phone;
        $billing_address->created_at = Carbon::now()->toDateTimeString();
        $billing_address->save();


        if (Shipping::where('user_id', Auth::user()->id)->exists()) {
            $shipping_address = Shipping::where('user_id', Auth::user()->id)->first();
        } else {
            $shipping_address = new Shipping();
        }
        $shipping_address->user_id = Auth::user()->id;
        $shipping_address->address1 = $req_billing_address->address;
        $shipping_address->address2 = $req_billing_address->address2;
        $shipping_address->city = $req_billing_address->town;
        $shipping_address->phone = $req_billing_address->phone;
        $shipping_address->mobile = $req_billing_address->phone;
        $shipping_address->created_at = Carbon::now()->toDateTimeString();
        $shipping_address->save();

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->invoice_date =  Carbon::now()->toDateTimeString();
        $order->subtotal = $request->sub_total;
        $order->total = $request->sub_total;
        $order->created_at = Carbon::now()->toDateTimeString();
        $order->save();
        $order->invoice_id = 10000 + $order->id;
        $order->save();

        foreach ($request->cart as $cart) {
            $cart = (object) $cart;
            $product_info = (object) $cart->product;
            $order_info = new OrderProduct();
            $order_info->customer_id = Auth::user()->id;
            $order_info->order_id = $order->id;
            $order_info->product_id = $product_info->id;
            $order_info->product_code = $product_info->code;
            $order_info->product_name = $product_info->name;
            $order_info->qty  = $cart->qty;
            $order_info->color = $cart->color;
            $order_info->size  = $cart->size;
            $order_info->price = $cart->product_price;
            $order_info->creator = Auth::user()->id;
            $order_info->created_at = Carbon::now()->toDateTimeString();
            $order_info->save();
        }
        return response()->json([
            'invoice_id' => $order->invoice_id,
            'invoice_date' => Carbon::parse($order->invoice_date)->format('d,M Y'),
        ]);


       // return $request->all();
    }


    public function latest_check_out_info(){
         $order = Order::where('user_id',Auth::user()->id)->orderBy('id','DESC')->with('order_products')->first();

        return $order;
    }
}
