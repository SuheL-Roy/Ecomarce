<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\color;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Publication;
use App\Models\Size;
use App\Models\Status;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Models\Vendor;
use App\Models\Writer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::where('status', 1)->get();

        $colors = color::where('status', 1)->get();
        $sizes = Size::where('status', 1)->get();
        $units = Unit::where('status', 1)->get();
        $status = Status::where('status', 1)->get();
        $writer = Writer::where('status', 1)->get();
        $vendor = Vendor::where('status', 1)->get();
        $publication = Publication::where('status', 1)->get();

        $main_categories = MainCategory::where('status', 1)->latest()->get();

        $categories1 = Category::where('status', 1)->get();

        $subcategories1 = SubCategory::where('status', 1)->get();

        //return $main_categories;

        $latest_main_category_id = MainCategory::where('status', 1)->latest()->first()->id;
       // return $latest_main_category_id;

         $categories = Category::where('status', 1)->where('main_category_id', $latest_main_category_id)->latest()->get();

        $latest_category_id = Category::where('status', 1)->where('main_category_id', $latest_main_category_id)->latest()->first()->id;
      
        
       //return [$latest_main_category_id];

        $subcategories = SubCategory::where('status', 1)
            ->where('main_category_id', $latest_main_category_id)
            ->where('category_id', $latest_category_id)->latest()->get();

           //return $subcategories;

        return view('admin.product.create', compact('subcategories','writer','publication','brands','colors','sizes','units','status','main_categories','categories','vendor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product)
    {
        $this->validate($request, [
            'product_name' => ['required'],
            'brand' => ['required'],
            'product_main_category_id' => ['required'],
            'product_category_id' => ['required'],
            'product_sub_category_id' => ['required'],
            'color_id' => ['required'],
            'size_id' => ['required'],
            'unit_id' => ['required'],
            'vendor_id' => ['required'],
            'price' => ['required'],
            'discount' => ['required'],
            'expiration_date' => ['required'],
            'stock' => ['required'],
            'alert_quantity' => ['required'],
            'description' => ['required'],
            'features' => ['required'],
            'thumb_image' => ['required'],
            'related_images' => ['required'],
            'status' => ['required'],
        ]);  

        $product = new Product();
        $product->name = $request->product_name;
        $product->brand_id = $request->brand;
        $product->code = '';
        $product->tax = $request->tax;
        $product->price = $request->price;
        $product->sku = '';
        $product->stock = $request->stock;
        $product->discount_price = $request->discount;
        $product->expiration_date = $request->expiration_date;
        $product->minimum_amount = $request->alert_quantity;
        $product->free_delivery = $request->free_delivery;
        $product->description = $request->description;
        $product->features = $request->features;
        $product->thumb_image = $request->thumb_image;
        $product->status = $request->status;
        $product->creator= Auth::user()->id;
        $product->save();

        $product->code = 'ECO-' . Carbon::now()->year . Carbon::now()->month . $product->id . Carbon::now()->day;
        $product->slug =  $product->id . uniqid(10);

        $product->save();

        return $product;


       






        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.product.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
