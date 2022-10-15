<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sub_Category = SubCategory::where('status',1)->latest()->paginate(10);
        return view('admin.product.Sub_Category.index',compact('Sub_Category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_category = MainCategory::where('status',1)->latest()->get();
        $category = Category::where('status',1)->where('main_category_id',MainCategory::where('status',1)->latest()->first()->id)->latest()->get();
       // return $category;
        return view('admin.product.Sub_Category.create',compact('main_category','category'));
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
            'main_category_id' => ['required'],
            'category_id' => ['required'], 
            'icon' => ['required']
        ]);
        $Sub_category = SubCategory::create($request->except('icon'));

        if ($request->hasFile('icon')) {
            $Sub_category->icon = Storage::put('uploads/SubCategory', $request->file('icon'));
            $Sub_category->save();
        }

        $Sub_category->slug = Str::slug($Sub_category->name);
        $Sub_category->creator = Auth::user()->id;
        $Sub_category->save();
       // return 'success';
       return response()->json([
        'html' => "<option value='".$Sub_category->id."'>".$Sub_category->name."</option>",
        'value' => $Sub_category->id,
    ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $sub_category)
    {
        return view('admin.product.Sub_Category.view',compact('sub_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $sub_category)
    {
       // return $sub_category;
        $main_category = MainCategory::where('status',1)->where('id',$sub_category->main_category_id)->latest()->get();
       
        $category = Category::where('status',1)->where('main_category_id',$sub_category->main_category_id)->latest()->get();

        //return [$main_category,$category,$sub_category];
        return view('admin.product.Sub_Category.edit',compact('main_category','category','sub_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $sub_category)
    {
        $this->validate($request, [
            'name' => ['required'],
            'main_category_id' => ['required'],
            'category_id' => ['required'], 
        ]);
        $sub_category->update($request->except('icon'));

        if ($request->hasFile('icon')) {
            $sub_category->icon = Storage::put('uploads/SubCategory', $request->file('icon'));
            $sub_category->save();
        }

        $sub_category->slug = Str::slug($sub_category->name);
        $sub_category->creator = Auth::user()->id;
        $sub_category->save();
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $sub_category)
    {
        $sub_category->delete();
        return response('success');
    }
}
