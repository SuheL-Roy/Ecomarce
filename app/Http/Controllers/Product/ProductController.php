<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\color;
use App\Models\MainCategory;
use App\Models\Publication;
use App\Models\Size;
use App\Models\Status;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Models\Vendor;
use App\Models\Writer;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
      
      $this->validate($request,[
        'product_name'=>['required'],
        'brand_id'=>['required'],
        'product_main_category_id'=>['required'],
        'product_category_id'=> ['required'],
        'writer_id' => ['required'],
        'publication_id' => ['required'],
        'sub_category_id'=> ['required'],
        'color_id'=> ['required'],
        'size_id'=> ['required'],
        'unit_id'=> ['required'],
        'price'=>['required'],
        'tax'=>['required'],
        'discount_price'=> ['required'],
        'expiration_date'=> ['required'],
        'stock'=> ['required'],
        'alert_quantity'=> ['required'],
        'description'=> ['required'],
        'features'=> ['required'],
        'thumb_image'=> ['required'],
        'related_images'=> ['required'],
        'vendor_id'=> ['required'],
        'status'=> ['required'],
      ]);
     
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
