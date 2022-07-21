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
                                    <td style="width: 40%">title</td>
                                    <td>:</td>
                                    <td>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dignissimos, pariatur cum rem laborum nesciunt itaque labore excepturi accusantium?
                                        Odio perspiciatis quos fugiat eos, reprehenderit atque aut voluptas eum ipsum.
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">title</td>
                                    <td>:</td>
                                    <td>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dignissimos, pariatur cum rem laborum nesciunt itaque labore excepturi accusantium?
                                        Odio perspiciatis quos fugiat eos, reprehenderit atque aut voluptas eum ipsum.
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 40%">title</td>
                                    <td>:</td>
                                    <td>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci dignissimos, pariatur cum rem laborum nesciunt itaque labore excepturi accusantium?
                                        Odio perspiciatis quos fugiat eos, reprehenderit atque aut voluptas eum ipsum.
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