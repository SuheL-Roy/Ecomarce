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

            @include('admin.includes.Bread_Crumb',['title'=>'SubCategory'])
        </div>
        <!-- End Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <td style="width: 40%">Name</td>
                                    <td>:</td>
                                    <td>
                                       {{$sub_category->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">MainCategoryName</td>
                                    <td>:</td>
                                    <td>
                                       {{$sub_category->main_category_info->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">CategoryName</td>
                                    <td>:</td>
                                    <td>
                                       {{$sub_category->category_info->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">Logo</td>
                                    <td>:</td>
                                    <td>
                                    <img src="/{{ $sub_category->icon }}" height="60" alt="" srcset="">
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