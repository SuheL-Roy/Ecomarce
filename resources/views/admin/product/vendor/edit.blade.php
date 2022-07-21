@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">

            @include('admin.includes.Bread_Crumb',['title'=>'Edit Vendor'])
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="card-heder d-flex justify-content-between">
                            <div class="card-title">Update Vendor</div>
                            <a href="{{ route('vendor.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Back</a>
                        </div>
                        <hr />
                        <form method="POST" class="update_insert" action="{{ route('vendor.update',$vendor) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="input-21" value="{{$vendor->name }}" placeholder="Enter Your Name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-21" class="col-sm-2 col-form-label">Mobile</label>
                                <div class="col-sm-10">
                                    <input type="number" name="mobile_no" class="form-control" value="{{$vendor->mobile_no }}"  cols="30" rows="10"></input>
                                 
                                    <span class="text-danger mobile_no"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-21" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" value="{{$vendor->email }}"  cols="30" rows="10"></input>
                                 
                                    <span class="text-danger email"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-21" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" id="mytextarea1" cols="30" rows="10">{{$vendor->description}}</textarea>
                                 
                                    <span class="text-danger description"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input-21" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" class="form-control" id="mytextarea1" cols="30" rows="10">{{$vendor->address}}</textarea>  
                                    <span class="text-danger address"></span>
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label for="input-21" class="col-sm-2 col-form-label">Icon</label>
                                <div class="col-sm-10">
                                    <img src="/{{$vendor->image}}" style="height: 50px; margin-bottom: 10px;" alt="user image"> <br>
                                    <input type="file" name="image" class="form-control" id="input-21" placeholder="Enter Your Name" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-white px-5"><i class="icon-lock"></i>Update</button>
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
        <link rel="stylesheet" href="{{ asset('contents/admin') }}/plugins/summernote/dist/summernote-bs4.css" />
    @endpush

    @push('cjs')
        <script src="{{ asset('contents/admin') }}/plugins/summernote/dist/summernote-bs4.min.js"></script>
        {{-- <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script> --}}

        <script>
            // tinymce.init({
            //     selector: '#mytextarea1'
            // });
            // tinymce.init({
            //     selector: '#mytextarea2'
            // });
            $('#mytextarea1').summernote({
                    height: 400,
                    tabsize: 2
                });
        </script>
    @endpush
@endsection