@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">

            @include('admin.includes.Bread_Crumb',['title'=>'SubCategory'])
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-16">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">Category</h5>
                        <a href="{{ route('sub-category.create') }}" class="btn btn-warning waves-effect waves-light m-1">
                            <i class="fa fa-plus"></i> <span>Add SubCategory</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name </th>
                                        <th scope="col">MainCategory</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Sub_Category as $key=>$data )
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->main_category_info->name}}</td>
                                        <td>{{$data->category_info->name}}</td>

                                        <td>
                                            <div>
                                                <a type="button" href="{{ route('sub-category.show',$data->id) }}" class="btn btn-light waves-effect waves-light m-1">
                                                    <i class="fa fa-eye"></i> <span>view</span>
                                                </a>
                                               <a type="button" href="{{ route('sub-category.edit',$data->id) }}" class="btn btn-light waves-effect waves-light m-1">
                                                    <i class="fa fa-pencil"></i> <span>edit</span>
                                                </a>
                                                <a type="button" href="{{ route('sub-category.destroy',$data->id) }}" class="destroy_btn btn btn-light waves-effect waves-light m-1">
                                                    <i class="fa fa-trash"></i> <span>delete</span>
                                                </a>

                                            </div>
                                        </td>


                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
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