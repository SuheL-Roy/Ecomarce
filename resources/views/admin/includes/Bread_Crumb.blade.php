<div class="col-sm-9">
    <h4 class="page-title">{{$title}}</h4>
    <ol class="breadcrumb">
        @php
        $path_info = $_SERVER['PATH_INFO'];
        $path_info = explode('/',$path_info);
        @endphp
        @foreach ( $path_info as $item )
        <li class="breadcrumb-item"><a href="javaScript:void();">{{$item}}</a></li>
        @endforeach

        <!-- <li class="breadcrumb-item"><a href="javaScript:void();">Pages</a></li>
        <li class="breadcrumb-item active" aria-current="page">Blank Page</li> -->
    </ol>
</div>