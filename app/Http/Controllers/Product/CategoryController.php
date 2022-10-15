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

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = Category::where('status', 1)->latest()->paginate(10);
        return view('admin.product.category.index', compact('Category'));
    }

    public function get_category_json()
    {

        $collection = Category::where('status',1)->latest()->get();
        $options = '';
        foreach ($collection as $key => $value) {
            $options .= "<option ".($key==0?' selected':'')." value='".$value->id."'>".$value->name."</option>";
        }
        return $options;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_category = MainCategory::where('status', 1)->latest()->get();
        // return $collection;
        return view('admin.product.category.create', compact('main_category'));
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
            'main_category_id' => ['required'],
            'icon' => ['required']
        ]);
        $category = Category::create($request->except('icon'));

        if ($request->hasFile('icon')) {
            $category->icon = Storage::put('uploads/mainCategory', $request->file('icon'));
            $category->save();
        }

        $category->slug = Str::slug($category->name);
        $category->creator = Auth::user()->id;
        $category->save();
       // return 'success';
       // return redirect()->back()->with('success', 'category created');
       return response()->json([
        'html' => "<option value='".$category->id."'>".$category->name."</option>",
        'value' => $category->id,
    ]);

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
       // return view('') 
       return view('admin.product.category.view', compact('category'));
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $collection = MainCategory::where('status',1)->latest()->get(); 
        return view('admin.product.category.edit', compact('category','collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => ['required'],
            'main_category_id' => ['required'],
        ]);
        
        $category->update($request->except('icon'));

        if ($request->hasFile('icon')) {
            $category->icon = Storage::put('uploads/mainCategory', $request->file('icon'));
            $category->save();
        }

        $category->slug = Str::slug($category->name);
        $category->creator = Auth::user()->id;
        $category->save();
        return 'Updated';
    }

    public function get_category_by_main_category($main_category_id){
           //dd($main_category_id);
           //echo'djdd';
           $categories = Category::where('main_category_id', $main_category_id)->get();
          // return $categories;
           $option = "";
           foreach( $categories as $key=>$value){
             $id = $value->id;
             $name = $value->name;
            //  $option .= "<option value='$id'>$name</option>";
            $option.= "<option".($key==0?' selected ':'')." value='$id' >$name</option>";
           }

           return $option;
    }

    public function get_sub_category_by_category($category_id){
       // return $category_id;
        // dd($category_id);
         //echo'djdd';
         $sub_categories = SubCategory::where('category_id',$category_id)->get();
          $option = "";
        foreach ($sub_categories as $key => $value) {
            $id = $value->id;
            $name = $value->name;
            $option.= "<option".($key==0?' selected ':'')." value='$id' >$name</option>";
        }
         return $option;
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       $category->delete();
       return response('successfully delete');
      // return $category;
    }
}
