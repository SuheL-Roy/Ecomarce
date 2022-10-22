<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from demo.hasthemes.com/oneclick-preview/oneclick/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 10:49:54 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ecommerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('contents/websites') }}/img/favicon.png">

    <!-- All css files are included here. -->
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('contents/websites') }}/css/animate.min.css">
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('contents/websites') }}/css/bootstrap.min.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset('contents/websites') }}/css/font-awesome.min.css">
    <!-- nivo-slider css -->
    <link rel="stylesheet" href="{{ asset('contents/websites') }}/css/nivo-slider.css">
    <!-- owl carousel css -->
    <link rel="stylesheet" href="{{ asset('contents/websites') }}/css/owl.carousel.min.css">
    <!-- icofont css -->
    <link rel="stylesheet" href="{{ asset('contents/websites') }}/css/icofont.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ asset('contents/websites') }}/css/meanmenu.css">
    <!-- jquery-ui css -->
    <link rel="stylesheet" href="{{ asset('contents/websites') }}/css/jquery-ui.min.css">
    <!-- magnific-popup css -->
    <link rel="stylesheet" href="{{ asset('contents/websites') }}/css/magnific-popup.css">
    <!-- percircle css -->
    <link rel="stylesheet" href="{{ asset('contents/websites') }}/css/percircle.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('contents/websites') }}/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('contents/websites') }}/css/responsive.css">

    <!-- Modernizr JS -->
    <script src="{{ asset('contents/websites') }}/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- header start -->
    <div id="app">
    <div class="main-wrapper box-shadow">
        <header class="clearfix">
            <div class="header-top-area bb hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                            @include('forntend.ecommarce.layouts.header_lang')
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-12">
                            @include('forntend.ecommarce.layouts.header_right_link')
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle-area ptb-25">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-12">
                            @include('forntend.ecommarce.layouts.logo')
                        </div>
                        <div class="col-xl-9 col-lg-9 d-none d-lg-block">
                            <div class="home3-mainmenu mainmenu mt-12 home3-hover dropdown text-right">
                                <nav>
                                    @include('forntend.ecommarce.layouts.navbar')
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom home3-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                            @include('forntend.ecommarce.layouts.menu_sidebar')
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-8 col-12">
                            @include('forntend.ecommarce.layouts.search')
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4  col-12">
                            @include('forntend.ecommarce.layouts.header_cart')
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobail-menu-area home3-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-md-6 d-block d-lg-none">
                            <div class="mobail-menu-active">
                                <nav>
                                    <ul>
                                        <li class="active"><a href="index.html">Home</a>
                                            <ul>
                                                <li><a href="index.html">Home shop 1</a></li>
                                                <li><a href="index-2.html">Home shop 2</a></li>
                                                <li><a href="index-3.html">Home shop 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Shop</a>
                                            <ul>
                                                <li><a class="mega-title" href="#">Shop Layout</a>
                                                    <ul>
                                                        <li><a href="shop-full-width.html">Full Width</a></li>
                                                        <li><a href="shop-sitebar-right.html">Sidebar Right</a></li>
                                                        <li><a href="shop-sitebar-left.html">Sidebar Left</a></li>
                                                        <li><a href="Shop-list-view.html">List View</a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="mega-title" href="#">Shop Pages</a>
                                                    <ul>
                                                        <li><a href="account.html">My account</a></li>
                                                        <li><a href="cart.html">Shoping cart</a></li>
                                                        <li><a href="checkout.html">checkout</a></li>
                                                        <li><a href="wishlist.html">wishlist</a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="mega-title" href="#">Product type</a>
                                                    <ul>
                                                        <li><a href="shop-simple-product.html">simple product</a></li>
                                                        <li><a href="shop-variable-Product.html">Variable Product</a>
                                                        </li>
                                                        <li><a href="shop-grouped-Product.html">Grouped Product</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">blog <i class="fa fa-caret-down"></i></a>
                                            <ul>
                                                <li><a href="#">Blog Layouts 1 <i class="fa fa-angle-right"></i></a>
                                                    <ul>
                                                        <li><a href="blog-left-sitebar-list.html">left sitebar list</a>
                                                        </li>
                                                        <li><a href="blog-left-sitebar-1.html">left sitebar grid 1</a>
                                                        </li>
                                                        <li><a href="blog-left-sitebar-2.html">left sitebar grid 2</a>
                                                        </li>
                                                        <li><a href="blog-left-sitebar-3.html">left sitebar grid 3</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Blog Layouts 2 <i class="fa fa-angle-right"></i></a>
                                                    <ul>
                                                        <li><a href="blog-right-sitebar-list.html">right sitebar
                                                                list</a></li>
                                                        <li><a href="blog-right-sitebar-list-1.html">right sitebar list
                                                                1</a></li>
                                                        <li><a href="blog-right-sitebar-list-2.html">right sitebar list
                                                                2</a></li>
                                                        <li><a href="blog-right-sitebar-list-3.html">right sitebar list
                                                                3</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Blog Layouts 3 <i class="fa fa-angle-right"></i></a>
                                                    <ul>
                                                        <li><a href="blog-1-col.html">grid 1 columns</a></li>
                                                        <li><a href="blog-2-col.html">grid 2 columns</a></li>
                                                        <li><a href="blog-3-col.html">grid 3 columns</a></li>
                                                        <li><a href="blog-4-col.html">grid 4 columns</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Blog Layouts 4 <i class="fa fa-angle-right"></i></a>
                                                    <ul>
                                                        <li><a href="blog-details-1.html">format:images</a></li>
                                                        <li><a href="blog-details-gallery.html">format:gallery</a></li>
                                                        <li><a href="blog-details-vedio.html">format:video</a></li>
                                                        <li><a href="blog-details-2.html">format:audio</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">pages <i class="fa fa-caret-down"></i></a>
                                            <ul>
                                                <li><a href="about.html">about us</a></li>
                                                <li><a href="faq.html">F.A.Q.s</a></li>
                                                <li><a href="404.html">404 pages</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="protfolio.html">Protfolio <i class="fa fa-caret-down"></i></a>
                                            <ul>
                                                <li><a href="protfolio-details-1.html">single project</a></li>
                                                <li><a href="protfolio-2-col.html">two columns</a></li>
                                                <li><a href="protfolio-3-col.html">three columns</a></li>
                                                <li><a href="protfolio.html">four columns</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">contact us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <!-- order-area start -->
        <div class="order-area box-shadow ptb-30 bb bg-fff">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="single-order c-fff home3-bg p-20">
                            <div class="order-icon">
                                <span class="fa fa-plane"></span>
                            </div>
                            <div class="order-content">
                                <h5>World-Wide Shipping</h5>
                                <span>On order over $100</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="single-order c-fff home3-bg p-20">
                            <div class="order-icon">
                                <span class="fa fa-refresh"></span>
                            </div>
                            <div class="order-content">
                                <h5>30 Days Return</h5>
                                <span>Moneyback guarantee</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="single-order c-fff home3-bg p-20 mrg-top-md">
                            <div class="order-icon">
                                <span class="fa fa-umbrella"></span>
                            </div>
                            <div class="order-content">
                                <h5>SUPPORT 24/7</h5>
                                <span>Call us: ( +123 ) 456 789</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="single-order c-fff home3-bg p-20 mrg-top-md">
                            <div class="order-icon">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="order-content">
                                <h5>MEMBER DISCOUNT</h5>
                                <span>10% on order over $200</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- order-area end -->
        <!-- footer-area start -->
        <footer class="bg-fff bt">
            <div class="footer-top-area ptb-35 bb">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                            <div class="footer-widget">
                                <div class="footer-logo mb-25">
                                    <img src="{{ asset('contents/websites') }}/img/logo/1.png"
                                        alt="" />
                                </div>
                                <div class="footer-content">
                                    <p>OneClick is a premium Wordpress theme with advanced admin module. It's extremely
                                        customizable, easy to use and</p>
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Facebook"><i
                                                    class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Twetter"><i
                                                    class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Instagram"><i
                                                    class="fa fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Google-Plus"><i
                                                    class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" title="Linkedin"><i
                                                    class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h3 class="footer-title bb mb-20 pb-15">About Us</h3>
                                <ul>
                                    <li>
                                        <div class="contuct-content">
                                            <div class="contuct-icon">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <div class="contuct-info">
                                                <span>75, Avenue Anatole France, Paris</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contuct-content">
                                            <div class="contuct-icon">
                                                <i class="fa fa-fax"></i>
                                            </div>
                                            <div class="contuct-info">
                                                <span>01.234 56789 - 10.987 65432</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contuct-content">
                                            <div class="contuct-icon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <div class="contuct-info">
                                                <span>hasib.me1995@gmail.com</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12">
                            <div class="footer-widget">
                                <h3 class="footer-title bb mb-20 pb-15">Information</h3>
                                <div class="footer-menu home3-hover">
                                    <ul>
                                        <li><a href="blog.html">Our Blog</a></li>
                                        <li><a href="shop.html">About Our Shop</a></li>
                                        <li><a href="#">Secure Shopping</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12">
                            <div class="footer-widget">
                                <h3 class="footer-title bb mb-20 pb-15">My account</h3>
                                <div class="footer-menu home3-hover">
                                    <ul>
                                        <li><a href="account.html">My Account</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-12">
                            <div class="footer-widget">
                                <h3 class="footer-title bb mb-20 pb-15">Our services</h3>
                                <div class="footer-menu">
                                    <ul>
                                        <li><a href="#">Shipping & Returns</a></li>
                                        <li><a href="#">Secure Shopping</a></li>
                                        <li><a href="#">International Shipping</a></li>
                                        <li><a href="#">Affiliates</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom ptb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="copyright">
                                <span>Copyright &copy; 2022 <a href="#">HunterCafe</a> All Rights Reserved.</span>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="mayment text-right">
                                <a href="#">
                                    <img src="{{ asset('contents/websites') }}/img/p14.png"
                                        alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area end -->
    </div>
   </div>
    <script src="/js/app.js"></script>
    <!-- Placed js at the end of the document so the pages load faster -->
    <!-- jquery latest version -->
    {{-- <script src="{{ asset('contents/websites') }}/js/vendor/jquery-1.12.4.min.js"></script> --}}
    <!-- Popper js -->
    <script src="{{ asset('contents/websites') }}/js/popper.js"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ asset('contents/websites') }}/js/bootstrap.min.js"></script>
    <!-- magnific popup js -->
    <script src="{{ asset('contents/websites') }}/js/jquery.magnific-popup.min.js"></script>
    <!-- mixitup js -->
    <script src="{{ asset('contents/websites') }}/js/jquery.mixitup.min.js"></script>
    <!-- jquery-ui price-->
    <script src="{{ asset('contents/websites') }}/js/jquery-ui.min.js"></script>
    <!-- ScrollUp Js -->
    <script src="{{ asset('contents/websites') }}/js/jquery.scrollUp.min.js"></script>
    <!-- countDown Js -->
    <script src="{{ asset('contents/websites') }}/js/jquery.countdown.min.js"></script>
    <!-- nivo slider js -->
    <script src="{{ asset('contents/websites') }}/js/jquery.nivo.slider.pack.js"></script>
    <!-- mobail menu js -->
    <script src="{{ asset('contents/websites') }}/js/jquery.meanmenu.js"></script>
    <!-- owl carousel js -->
    <script src="{{ asset('contents/websites') }}/js/owl.carousel.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{ asset('contents/websites') }}/js/plugins.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{ asset('contents/websites') }}/js/main.js"></script>
</body>

<!-- Mirrored from demo.hasthemes.com/oneclick-preview/oneclick/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 10:49:54 GMT -->

</html>
