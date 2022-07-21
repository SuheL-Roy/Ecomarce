@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">

            @include('admin.includes.Bread_Crumb',['title'=>'Create SubCategory'])
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Add SubCategory</div>
                        <hr />
                        <form method="POST" class="insert_form" action="{{ route('sub-category.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="input-21" placeholder="Enter Your Name" />
                                    <span class="text-danger name"></span>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-21" class="col-sm-2 col-form-label">MainCategory</label>
                                <div class="col-sm-10">
                                    <select name="main_category_id" id="main_category" class="form-control">
                                        <!-- <option value="">Select MainCategory</option> -->
                                        @foreach ( $main_category as $key=>$item)
                                        <option {{ $key==0?'selected':''}} value="{{ $item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger main_category_id"></span>
                                    <!-- @error('main_category_id')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-21" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="category_id" id="category" class="form-control">
                                        <!-- <option value="">Select Category</option> -->
                                        @foreach ( $category as $key=>$item)
                                        <option {{ $key==0?'selected':''}} value="{{ $item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger category_id"></span>
                                    <!-- @error('main_category_id')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input-21" class="col-sm-2 col-form-label">Icon</label>
                                <div class="col-sm-10">
                                    <input type="file" name="icon" class="form-control" id="input-21" placeholder="Enter Your Name" />
                                    <span class="text-danger name"></span>
                                    @error('icon')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-white px-5"><i class="icon-lock"></i> ADD</button>
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
@push('cjs')

<script>
    $('#main_category').on('change', function() {
        let value = $(this).val();
        $.get("/admin/product/get-all-cateogory-selected-by-main-category/" + value, (res) => {
            $('#category').html(res);

            //console.log(res);
        })
    })
</script>

@endpush

@endsection