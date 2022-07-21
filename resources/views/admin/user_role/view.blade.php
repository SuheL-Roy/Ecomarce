@extends('admin.layouts.admin')
@section('content')
<style>
    .card .table td,
    .card .table th {
        white-space: break-spaces;
    }
</style>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">

            @include('admin.includes.Bread_Crumb',['title'=>'View'])
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped">
                            <tr>
                                    <td style="width: 40%">Photo</td>
                                    <td>:</td>
                                    <td>
                                    <img src="/{{ $user->photo }}" height="60" alt="" srcset="">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">FirstName</td>
                                    <td>:</td>
                                    <td>
                                       {{$user->first_name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">LastName</td>
                                    <td>:</td>
                                    <td>
                                        {{$user->last_name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">UserName</td>
                                    <td>:</td>
                                    <td>
                                       {{$user->username}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Email</td>
                                    <td>:</td>
                                    <td>
                                       {{$user->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Role Name</td>
                                    <td>:</td>
                                    <td>
                                       {{$user->phone}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Creator</td>
                                    <td>:</td>
                                    <td>
                                       {{$user->creator}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Role Name</td>
                                    <td>:</td>
                                    <td>
                                       {{$user->role_id}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Created At</td>
                                    <td>:</td>
                                    <td>
                                       {{$user->created_at->format('d M Y h:i:s a')}}
                                    </td>
                                </tr>

                            </table>
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