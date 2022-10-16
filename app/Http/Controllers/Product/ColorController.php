<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = color::where('status',1)->latest()->paginate(); 
        return view('admin.product.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        $this->validate($request, [
            'name' => ['required']
        ]);

      //  dd($request->all);

        $colors = color::create($request->all());

        $colors->slug = Str::slug($colors->name);
        $colors->creator = Auth::user()->id;
        $colors->save();

        return response()->json([
            'html' => "<option value='".$colors->id."'>".$colors->name."</option>",
            'value' => $colors->id,
        ]);


     // return redirect()->back()->with('success', 'color created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(color $color)
    {
        return view('admin.product.color.edit',compact('color'));
        
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
        $this->validate($request, [
            'name' => ['required']
        ]);
        $colors=color::find($id); 
        $colors->update($request->all());

        $colors->slug = Str::slug($colors->name);
        $colors->creator = Auth::user()->id;
        $colors->save();

        return redirect()->route('color.index')->with('success', 'color created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(color $color)
    {
        $color->delete();
        return response('Deleted successfully');
    }
}
