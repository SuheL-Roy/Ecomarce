<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = Vendor::where('status',1)->latest()->paginate(10);
        return view('admin.product.vendor.index',compact('vendor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'mobile_no' => ['required'],
            'email' => ['required'],
            'description' => ['required'],
            'address' => ['required'],
            'image' => ['required']
        ]);
        $vendor = Vendor::create($request->except('image'));

        if ($request->hasFile('image')) {
            $vendor->image = Storage::put('uploads/vendor', $request->file('image'));
            $vendor->save();
        }

        $vendor->slug = Str::slug($vendor->name);
        $vendor->creator = Auth::user()->id;
        $vendor->save();
        
        return response()->json([
            'html' => "<option value='".$vendor->id."'>".$vendor->name."</option>",
            'value' => $vendor->id,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        return view('admin.product.Vendor.view',compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        return view('admin.product.vendor.edit',compact('vendor'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $this->validate($request, [
            'name' => ['required'],
            'mobile_no' => ['required'],
            'email' => ['required'],
            'description' => ['required'],
            'address' => ['required']
        ]);
        $vendor->update($request->except('image'));

        if ($request->hasFile('image')) {
            $vendor->image = Storage::put('uploads/vendor', $request->file('image'));
            $vendor->save();
        }

        $vendor->slug = Str::slug($vendor->name);
        $vendor->creator = Auth::user()->id;
        $vendor->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendor $vendor)
    {
        $vendor->delete();

        return response('deleted successfully');
    }
}
