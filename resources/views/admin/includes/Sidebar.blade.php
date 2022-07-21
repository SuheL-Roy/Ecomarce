<ul class="metismenu" id="menu">
    <li>
        <a class="has-arrow" href="javascript:void();">
            <div class="parent-icon"><i class="zmdi zmdi-view-dashboard"></i></div>
            <div class="menu-title">Dashboard</div>
        </a>
        <ul class="">
            <li><a href="index.html"><i class="zmdi zmdi-dot-circle-alt"></i> eCommerce v1</a></li>
        </ul>
    </li>

    <li>
        <a class="has-arrow" href="javascript:void();">
            <div class="parent-icon"><i class="zmdi zmdi-view-dashboard"></i></div>
            <div class="menu-title">Product Management</div>
        </a>
        <ul class="">
            <li><a href="{{ route('product.create') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    Add Product </a></li>
            <li><a href="{{ route('Main-category.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    Main Category </a></li>
            <li><a href="{{ route('category.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    Category </a></li>
            <li><a href="{{ route('sub-category.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    SubCategory </a></li>
            <li><a href="{{ route('brand.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    All Brand </a></li>
            <li><a href="{{ route('size.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    All Size </a></li>
            <li><a href="{{ route('color.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    All Color </a></li>
            <li><a href="{{ route('status.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    All Status </a></li>
            <li><a href="{{ route('unit.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    All Unit </a></li>
            <li><a href="{{ route('writer.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    All writer </a></li>
            <li><a href="{{ route('publication.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    All publication </a></li>
            <li><a href="{{ route('vendor.index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    All vendor </a></li>


        </ul>
    </li>
    @if(Auth::user()->role_id == 1)
    <li>
        <a class="has-arrow" href="javascript:void();">
            <div class="parent-icon"><i class="zmdi zmdi-view-dashboard"></i></div>
            <div class="menu-title">User Management</div>
        </a>
        <ul class="">
            <li><a href="{{ route('admin_user_index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    index</a></li>
        </ul>
        <ul class="">
            <li><a href="{{ route('admin_user_role_index') }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                    User Role</a></li>
        </ul>
    </li>
    @endif

    <li class="menu-label">Extra</li>
    <li>
        <a href="/" target="_blank">
            <div class="parent-icon"><i class="fa fa-globe"></i></div>
            <div class="menu-title">website</div>
        </a>

    </li>


    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); confirm('are you sure logout') &&
             document.getElementById('logout-form').submit();">
            <div class="parent-icon"><i class='fa fa-sign-out'></i></div>
            <div class="menu-title">Logout</div>
        </a>
    </li>

</ul>