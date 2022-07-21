@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">


            <blade
                include|(%26%2339%3Badmin.includes.Bread_Crumb%26%2339%3B%2C%5B%26%2339%3Btitle%26%2339%3B%3D%3E%26%2339%3BUser%20Management%26%2339%3B%5D) />

        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">All Users</h5>
                        <a href="{{ route('admin_user_create') }}"
                            class="btn btn-warning waves-effect waves-light m-1">
                            <i class="fa fa-plus"></i> <span>Add New</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">FirstName</th>
                                        <th scope="col">LastName</th>
                                        <th scope="col">UserName</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">role name</th>
                                        <th scope="col">created at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=>$item)
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td>{{ $item->first_name }}</td>
                                            <td>{{ $item->last_name }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->role_information->name ? $item->role_information->name : $item->role_information->role_id }}</td>
                                            <td>{{ $item->created_at->format('d M Y h:i:s a') }}
                                            </td>
                                            <td>
                                                <div>
                                                    <a type="button"
                                                        href="{{ route('admin_user_view',$item->id) }}"
                                                        class="btn btn-light waves-effect waves-light m-1">
                                                        <i class="fa fa-eye"></i> <span>view</span>
                                                    </a>
                                                    <a type="button"
                                                        href="{{ route('admin_user_edit',$item->id) }}"
                                                        class="btn btn-light waves-effect waves-light m-1">
                                                        <i class="fa fa-pencil"></i> <span>edit</span>
                                                    </a>
                                                    <a type="button" data-toggle="modal" data-target="#deleteModal"
                                                        data-url="{{ route('admin_user_delete') }}"
                                                        data-id="{{ $item->id }}" href=""
                                                        class="delete_btn btn btn-light waves-effect waves-light m-1">
                                                        <i class="fa fa-trash"></i> <span>delete</span>
                                                    </a>
                                                    <!-- <a type="button" href="#"
                                                            onclick="return (confirm('hei, Do you sure want to delete.') && $.post('{{route('admin_user_delete',['id'=>$item->id])}}',(res)=>{console.log(res,$(this).parents('tr').remove())}))"
                                                            class=" btn btn-danger waves-effect waves-light m-1">
                                                            <i class="fa fa-trash-o"></i> <span>delete</span>
                                                    </a> -->
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
