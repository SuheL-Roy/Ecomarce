<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $mainCategory = MainCategory::where('status',1)->latest()->paginate(10);
        return view('admin.product.Main_Category.index',compact('mainCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.Main_Category.create');
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
        $main_category = MainCategory::create($request->except('icon'));

        if ($request->hasFile('icon')) {
            $main_category->icon = Storage::put('uploads/mainCategory', $request->file('icon'));
            $main_category->save();
        }

        $main_category->slug = Str::slug($main_category->name);
        $main_category->creator = Auth::user()->id;
        $main_category->save();

         //return redirect()->back()->with('success', 'category created');
        return redirect()->route('Main-category.index',$main_category->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $main_category=MainCategory::find($id);
        return view('admin.product.Main_Category.view',compact('main_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $main_category=MainCategory::find($id);
        return view('admin.product.Main_Category.edit',compact('main_category'));
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
        
        $main_category = MainCategory::find($id);
        $main_category->update($request->except('icon'));

        if ($request->hasFile('icon')) {
            $main_category->icon = Storage::put('uploads/mainCategory', $request->file('icon'));
            $main_category->save();
        }

        $main_category->slug = Str::slug($main_category->name);
        $main_category->creator = Auth::user()->id;
        $main_category->save();

        // return redirect()->back()->with('success', 'main$main_category updated');
        return redirect()->route('Main-category.show',$main_category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $main_category = MainCategory::find($id);
        $main_category->delete($request->all());
        return $main_category;

        //return response('deleted successfully');
    }
}
