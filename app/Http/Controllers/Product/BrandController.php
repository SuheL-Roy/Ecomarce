<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::where('status', 1)->latest()->paginate(10);
        //return $data;
        return view('admin.product.brand.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => ['required'],
            'icon' => ['required']
        ]);
        $brand = Brand::create($request->except('icon'));

        if ($request->hasFile('icon')) {
            $brand->logo = Storage::put('uploads/mainCategory', $request->file('icon'));
            $brand->save();
        }

        $brand->slug = Str::slug($brand->name);
        $brand->creator = Auth::user()->id;
        $brand->save();

        // return redirect()->back()->with('success', 'Brand created');
        return redirect()->route('brand.index',$brand->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        return view('admin.product.brand.view', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.product.brand.edit', compact('brand'));
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

        $brand = Brand::find($id);
        $brand->update($request->except('icon'));

        if ($request->hasFile('icon')) {
            $brand->logo = Storage::put('uploads/mainCategory', $request->file('icon'));
            $brand->save();
        }

        $brand->slug = Str::slug($brand->name);
        $brand->creator = Auth::user()->id;
        $brand->save();

        // return redirect()->back()->with('success', 'Brand updated');
       // return redirect()->route('brand.show',$brand->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        // $brands = Brand::find($id);
          $brand->delete();
        //  $id->delete();
         return response('success');
        // return $brand;
      // return dd($brand);
       // return redirect()->with('message','deleted successfully');
    }
}
