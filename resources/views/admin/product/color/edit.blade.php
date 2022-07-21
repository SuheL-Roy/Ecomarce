@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">

            @include('admin.includes.Bread_Crumb',['title'=>'Edit Color'])
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-heder d-flex justify-content-between">
                            <div class="card-title">Update Color</div>
                            <a href="{{ route('color.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Back</a>
                        </div>
                        <hr />
                        <form method="POST" class="update_insert" action="{{ route('color.update', $color->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="input-21" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="input-21" value="{{$color->name }}" placeholder="Enter Your Name" />
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="input-21" class="col-sm-2 col-form-label">Icon</label>
                                <div class="col-sm-10">
                                    <img src="" style="height: 50px; margin-bottom: 10px;" alt="user image"> <br>
                                    <input type="file" name="icon" class="form-control" id="input-21" placeholder="Enter Your Name" />
                                </div>
                            </div> -->

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
@endsection