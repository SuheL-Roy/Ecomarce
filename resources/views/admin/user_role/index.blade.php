@extends('admin.layouts.admin')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">


            <blade
                include|(%26%2339%3Badmin.includes.Bread_Crumb%26%2339%3B%2C%5B%26%2339%3Btitle%26%2339%3B%3D%3E%26%2339%3BUser%20Role%20Management%26%2339%3B%5D) />

        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">All Users Role</h5>
                        <!-- <a href="{{ route('admin_user_create') }}" class="btn btn-warning waves-effect waves-light m-1">
                            <i class="fa fa-plus"></i> <span>Add New</span>
                        </a> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Serial No</th>
                                        <th scope="col">created at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($collection as $key=>$item)
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->serial }}</td>
                                            <td>{{ $item->created_at->format('d M Y h:i:s a') }}
                                            </td>
                                            <td>
                                                <div>
                                                    <!-- <a type="button" href="{{ route('admin_user_view',$item->id) }}" class="btn btn-light waves-effect waves-light m-1">
                                                    <i class="fa fa-eye"></i> <span>view</span>
                                                </a> -->
                                                    <a type="button" data-toggle="modal" data-target="#updateModal"
                                                        data-url="{{ route('admin_user_role_update') }}"
                                                        data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                        data-serial="{{ $item->serial }}" href=""
                                                        class="role_update_btn btn btn-light waves-effect waves-light m-1">
                                                        <i class="fa fa-pencil"></i> <span>edit</span>
                                                    </a>
                                                    <!-- <a type="button" href="{{ route('admin_user_delete',$item->id) }}" class="btn btn-light waves-effect waves-light m-1">
                                                    <i class="fa fa-trash"></i> <span>delete</span>
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

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalTitle">Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="update_role_form" name="update_role_form" action="{{ route('admin_user_role_update') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Serial</label>
                            <input type="number" class="form-control" name="serial" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@push('cjs')
 <script>
    $('.role_update_btn').on('click',function(){
        let url = $(this).data('url');
        let name = $(this).data('name');
        let serial = $(this).data('serial');
        let id = $(this).data('id');

        console.log(url,name,id,serial);
       $('.update_role_form').attr('url',url);
       $('.update_role_form input[name=name]').val(name);
       $('.update_role_form input[name=serial]').val(serial);
       $('.update_role_form input[name=id]').val(id);
       


    })
 </script>
@endpush

@endsection
