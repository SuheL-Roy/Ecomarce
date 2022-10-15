@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            @include('admin.includes.Bread_Crumb',['title'=>'Create Product'])
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Add Product</div>
                        <hr />
                        <form class="insert_form product_insert_form row" method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-21" class="col-form-label">Name</label>
                                @include('admin.product.components.input',[
                                    'name'=>'product_name',
                                    'type' => 'text',
                                ])
                                {{-- <div class="">
                                    <input type="text" name="product_name" class="form-control" id="input-21" placeholder="Name" />

                                    <span class="text-danger product_name"></span>

                                </div> --}}
                            </div>
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Brand</label>
                                @include('admin.product.components.select',[
                                    'name' => 'brand_id',
                                    'attributes' => 'multiple',
                                    'class' => 'multiple-select',
                                    'collection' => $brands,
                                    'action' => route('brand.store'),
                                     'fields' => [
                                        ['name' => 'name','type' => 'text'],
                                        ['name' => 'icon', 'type' => 'file'],
                                        
                                     ] 
                                    ])
                            </div>
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Main Category</label>
                                @include('admin.product.components.select',[
                                    'name' => 'product_main_category_id',
                                    'attributes' => 'multiple',
                                    'class' => 'multiple-select',
                                    'collection' => $main_categories,
                                    'action' => route('Main-category.store'),
                                     'fields' => [
                                        ['name' => 'name','type' => 'text'],
                                        ['name' => 'icon', 'type' => 'file'],
                                        
                                     ] 
                                    ])
                                {{-- <div class="">
                                    <!-- <input type="text" class="form-control" id="input-22" placeholder="Enter Your Email Address" /> -->
                                    <select name="main_category_id" id="select_main_category_id"  class="form-control multiple-select">
                                        @foreach($main_categories as $key=>$item )
                                        <option {{ $key==0?'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger main_category_id"></span>

                                </div> --}}
                            </div>
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Category</label>
                                @include('admin.product.components.select',[
                                    'name' => 'product_category_id',
                                    'attributes' => 'multiple',
                                    'class' => 'multiple-select',
                                    'collection' => $categories,
                                    'action' => route('category.store'),
                                    'fields' => [
                                            ['name' => 'main_category_id','type' => 'select','option_route'=>route('get_main_category_json')],
                                            ['name' => 'name','type' => 'text'],
                                            ['name' => 'icon','type' => 'file'],
                                        ]
                                    ])
                               
                            </div>
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Sub Category</label>
                                @include('admin.product.components.select',[
                                    'name' => 'sub_category_id',
                                    'attributes' => 'multiple',
                                    'class' => 'multiple-select',
                                    'collection' => $subcategories,
                                    'action' => route('sub-category.store'),
                                     'fields' => [
                                        [
                                        'name' => 'main_category_id',
                                        'type' => 'select',
                                        'class' => 'component_modal_main_category parent_select',
                                        'this_field_will_contorl' => 'component_modal_category',
                                        'option_route'=>route('get_main_category_json'),
                                        'this_field_control_route' => route('get_all_category_selected_by_main_category',''),
                                        ],
                                        [
                                         'name' => 'category_id',
                                         'class' => 'component_modal_category',
                                         'type' => 'select',
                                         'option_route'=>''
                                        ],
                                        ['name' => 'name','type' => 'text'],
                                        ['name' => 'icon', 'type' => 'file'],
                                        
                                     ] 
                                    ])
                             
                            </div>
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Writer</label>
                                @include('admin.product.components.select',[
                                    'name' => 'writer_id',
                                    'attributes' => 'multiple',
                                    'class' => 'multiple-select',
                                    'collection' => $writer,
                                    'action' => route('writer.store'),
                                     'fields' => [
                                        ['name' => 'name','type' => 'text'],
                                        ['name' => 'description', 'type' => 'textarea'],
                                        ['name' => 'image', 'type' => 'file'],
                                     ] 
                                    ])
                            </div>
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Publication</label>
                                @include('admin.product.components.select',[
                                    'name' => 'publication_id',
                                    'attributes' => 'multiple',
                                    'class' => 'multiple-select',
                                    'collection' => $publication,
                                    'action' => route('publication.store'),
                                     'fields' => [
                                        ['name' => 'name','type' => 'text'],
                                        ['name' => 'description', 'type' => 'textarea'],
                                        ['name' => 'image', 'type' => 'file'],
                                     ] 
                                    ])
                            </div>

                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Color</label>
                                 @include('admin.product.components.select',[
                                    'name' => 'color_id',
                                    'attributes' => 'multiple',
                                    'class' => 'multiple-select',
                                    'collection' => $colors,
                                    'action' => route('color.store'),
                                     'fields' => [
                                        ['name' => 'name','type' => 'text'],
                                        // ['name' => 'icon', 'type' => 'file'],
                                        // ['name' => 'description', 'type' => 'textarea'],
                                     ] 
                                    ])
                            </div>
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Size</label>
                                 @include('admin.product.components.select',[
                                    'name' => 'size_id',
                                    'attributes' => 'multiple',
                                    'class' => 'multiple-select',
                                    'collection' => $sizes,
                                    'action' => route('size.store'),
                                     'fields' => [
                                        ['name' => 'name','type' => 'text'],
                                     ] 
                                    ])
                            </div>
                           
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Unit</label>
                                @include('admin.product.components.select',[
                                    'name' => 'unit_id',
                                    'attributes' => 'multiple',
                                    'class' => 'multiple-select',
                                    'collection' => $units,
                                    'action' => route('unit.store'),
                                     'fields' => [
                                        ['name' => 'name','type' => 'text'],
                                     ] 
                                    ])
                            </div>
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Vendor</label>
                                @include('admin.product.components.select',[
                                    'name' => 'vendor_id',
                                    'attributes' => 'multiple',
                                    'class' => 'multiple-select',
                                    'collection' => $vendor ,
                                    'action' => route('vendor.store'),
                                     'fields' => [
                                        ['name' => 'name','type' => 'text'],
                                        ['name' => 'email','type' => 'email'],
                                        ['name' => 'mobile_no','type' => 'text'],
                                        ['name' => 'image', 'type' => 'file'],
                                        ['name' => 'address', 'type' => 'textarea'],
                                        ['name' => 'description', 'type' => 'textarea'],
                                     ] 
                                    ])
                              
                            </div>
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Price</label>
                                @include('admin.product.components.input',[
                                    'name'=>'price',
                                    'type' => 'text',
                                    'attr' =>"step='0.01'"
                                ])
                                {{-- <div class="">
                                    <input type="text" name="price" class="form-control" id="input-22" placeholder="Enter Your price" />
                                    <span class="text-danger price" style="font-size: 15px;"></span>
                                </div> --}}
                            </div>
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Tax</label>
                                @include('admin.product.components.input',[
                                    'name'=>'tax',
                                    'type' => 'text',            
                                ])
                                {{-- <div class="">
                                    <input type="text" name="price" class="form-control" id="input-22" placeholder="Enter Your price" />
                                    <span class="text-danger price" style="font-size: 15px;"></span>
                                </div> --}}
                            </div>

                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Discount</label>
                                @include('admin.product.components.input',[
                                    'name'=>'discount_price',
                                    'type' => 'text',
                                ])
                                {{-- <div class="">
                                    <input type="text" name="discount_price" class="form-control" id="input-22" placeholder="Enter Your discount" />
                                    <span class="text-danger discount_price"></span>

                                </div> --}}
                            </div>
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Expiration Date</label>
                                @include('admin.product.components.input',[
                                    'name'=>'expiration_date',
                                    'type' => 'date',
                                ])
                                {{-- <div class="">
                                    <input type="date" name="expiration_date" class="form-control" id="input-22" placeholder="Enter Your expiration_date" />
                                    <span class="text-danger expiration_date"></span>

                                </div> --}}
                            </div>
                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Stock</label>
                                @include('admin.product.components.input',[
                                    'name'=>'stock',
                                    'type' => 'number',
                                ])
                                {{-- <div class="">
                                    <input type="number" name="stock" class="form-control" id="input-22" placeholder="stock details" />
                                    <span class="text-danger stock"></span>
                                </div> --}}
                            </div>

                            <div class="form-group col-md-6  col-xl-4">
                                <label for="input-22" class="col-form-label">Alert Quantity</label>
                                @include('admin.product.components.input',[
                                    'name'=>'alert_quantity',
                                    'type' => 'number',
                                ])
                                {{-- <div class="">
                                    <input type="number" name="alert_quantity" class="form-control" id="input-22" placeholder="" />
                                    <span class="text-danger alert_quantity"></span>

                                </div> --}}
                            </div>
                            

                            <div class="col-12"> </div>
                            <div class="form-group col-md-6  col-xl-6">
                                <label for="input-22" class="col-form-label">Description</label>
                                <div class="">
                                    <textarea type="text" name="description" class="form-control" id="mytextarea1" cols="30" rows="10" placeholder="Description"></textarea>
                                    <span class="text-danger description"></span>
                                </div>
                            </div>
                            <div class="form-group col-md-6  col-xl-6">
                                <label for="input-22" class="col-form-label">Features</label>
                                <div class="">
                                    <textarea type="text" name="features" class="form-control" id="mytextarea2" cols="30" rows="10" placeholder="Features"></textarea>

                                    <span class="text-danger features"></span>
                                </div>
                            </div>


                            <div class="form-group col-md-6  col-xl-6">
                                <label for="input-22" class="col-form-label">Thumb Image</label>
                                @include('admin.product.components.input',[
                                    'name'=>'thumb_image',
                                    'type' => 'file',
                                    'attr' => ''
                                ])
                                {{-- <div class="">
                                    <input type="file" name="thumb_image" class="form-control" id="input-22" cols="30" rows="10" placeholder="Features"></input>

                                    <span class="text-danger thumb_image"></span>
                                </div> --}}
                            </div>


                            <div class="form-group col-md-6  col-xl-6">
                                <label for="input-22" class="col-form-label">Related Image</label>
                                @include('admin.product.components.input',[
                                    'name'=>'related_images',
                                    'type' => 'file',
                                    'attr' => 'multiple'
                                ])
                                {{-- <div class="">
                                    <input type="file" multiple name="related_images[]" class="form-control" id="input-22" cols="30" rows="10" placeholder="Features"></input>

                                    <span class="text-danger related_images"></span>
                                </div> --}}
                            </div>
                            <div class="form-group col-md-6  col-xl-6">
                                <label for="" class="col-form-label">Status</label>
                                <div class="">
                                  <select name="status" id=""  class="form-control">
                                        @foreach($status as $key=>$item )
                                        <option {{ $key==0?'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger status"></span>
                                </div>
                            </div>
                            <div class="form-group col-md-6  col-xl-6">
                                <label for="" class="col-form-label">Free Delivery</label>
                                <div class="">
                                    <select name="free_delivery"  class="form-control">
                                        <option value="false">Off</option>
                                        <option value="true">On</option>
                                    </select>
                                    <span class="text-danger status"></span>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label class="col-form-label"></label>
                                <div class="">
                                    <button type="submit" class="btn btn-white px-5"><i class="icon-lock"></i>
                                        Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--start overlay-->
        <div class="overlay"></div>
        <!--end overlay-->
    </div>
    <!-- End container-fluid-->

</div>
<!--End content-wrapper-->
<!--Start Back To Top Button-->
@push('ccss')
<link href="/contents/admin/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="/contents/admin/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/summernote/dist/summernote-bs4.css" />
@endpush

@push('cjs')
<script src="/contents/admin/plugins/select2/js/select2.min.js"></script>
<script src="{{ asset('contents/admin') }}/plugins/summernote/dist/summernote-bs4.min.js"></script>
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>


<script>
    $('.multiple-select').select2({

        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    //  tinymce.init({
    //      selector: '#mytextarea1'
    //  });
    //  tinymce.init({
    //      selector: '#mytextarea2'
    //  });

    $('#mytextarea1').summernote({
        height: 400,
        tabsize: 2
    });
    $('#mytextarea2').summernote({
        height: 400,
        tabsize: 2
    });

    $('#select_main_category_id').on('change', function() {
        let value = $(this).val();
        $.get("/admin/product/get-all-cateogory-selected-by-main-category/" + value, (res) => {
            $('#select_category_id').html(res);

            //console.log(res);
        })
    })

    $('#select_category_id').on('change', function() {
        let value = $(this).val();
        $.get("/admin/product/get-all-sub-category-selected-by-category/" + value, (res) => {
           $('#select_sub_category_id').html(res);

             console.log(res);
        })
    })
</script>

@endpush

@endsection