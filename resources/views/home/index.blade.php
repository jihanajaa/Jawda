<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Jawda Coffee | Farm &amp; Roastery Indonesia</title>

    <!-- SEO -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SEO -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Pacifico|Quicksand:300,400,500,700|Source+Sans+Pro:400,600,700" rel="stylesheet">
    <link href="css/icon-plugin/font-awesome.css" rel="stylesheet">
    <link href="css/icon-plugin/fontello.css" rel="stylesheet">
    <link href="css/revolution-plugin/extralayers.css" rel="stylesheet">
    <link href="css/revolution-plugin/settings.css" rel="stylesheet">
    <link href="css/bootstrap-plugin/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-plugin/bootstrap-slider.css" rel="stylesheet">
    <link href="css/animation/animate.min.css" rel="stylesheet">
    <link href="css/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="css/owl-carousel/owl.theme.default.css" rel="stylesheet">
    <link href="css/light-box/simplelightbox.css" rel="stylesheet">
    <link href="css/light-box/magnific-popup.css" rel="stylesheet">
    <link href="css/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet">
    <link href="css/form-field/jquery.formstyler.css" rel="stylesheet">
    <link href="css/Slick-slider/slick-theme.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Start Wrapper Part -->

    <div class="wrapper">

        <!-- Start Header Part -->

        <header>
            <div class="header-part header-full-menu">
                <div class="header-nav">
                    <div class="header-menu-long">
                        <div class="header-nav-inside">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img src="images/logo-web.png" width="200px" height="56px" alt="Jawda"></a>
                            </div>
                            <div class="menu-top-part">
                                <div class="menu-nav-main">
                                    <ul>
                                        <li class="has-child">
                                            <a href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li class="has-child">
                                            <a href="{{ route('about') }}">About</a>
                                        </li>
                                        <li class="has-child">
                                            <a href="{{ route('produk') }}">Produk</a>
                                        </li>
                                        <li class="has-child">
                                            <a href="{{ route('agen') }}">Agen</a>
                                        </li>
                                        <li class="has-child">
                                            <a href="{{ route('contact') }}">Contact</a>
                                        </li>
                                        <li class="has-child">
                                            <a href="{{ route('blog') }}">Blog</a>
                                        </li>
                                        @if (isset($menutops))
                                        @foreach ($menutops as $menu)
                                            <li class="has-child">
                                                <a href="{{ route('menu',$menu->slug) }}">{{$menu->menu}}</a>
                                            </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="header-search">
                                    <form action="{{ route('search') }}" method="GET">
                                        <input type="text" name="search">
                                    </form>
                                    <!-- <input type="submit" name="submit" value=""> -->
                                </div>
                                <div class="menu-icon">
                                    <a href="#" class="hambarger">
                                        <span class="bar-1"></span>
                                        <span class="bar-2"></span>
                                        <span class="bar-3"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>  

        <!-- End Header Part -->

        <!-- Start Main Part -->

<main>
<div class="main-part">
<!-- Slider Part -->
<section class="home-slider">
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                @foreach ($sliders as $slider)
                    <li data-transition="fade" data-slotamount="2" data-masterspeed="700" data-thumb="" data-saveperformance="on" data-title="Slide">
                        <img src="images/dummy.png" alt="slidebg1" data-lazyload="{{$slider->slider}}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    </li>
                @endforeach               
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
</section>

<!-- End Slider Part -->


<!-- Start Item list Part -->

<section class="default-section">
    <div class="container">
        <div class="title text-center">
            <h2 class="text-primary">Produk Terbaik Kami</h2>
            <h6>Greenbean, Roasting Robusta &amp; Liberika.</h6>
        </div>
        <div class="product-wrapper">
            <div class="owl-carousel owl-theme" data-items="4" data-tablet="3" data-mobile="2" data-nav="false" data-dots="true" data-autoplay="true" data-speed="1800" data-autotime="5000">
                @php
                    $i=0;
                @endphp
                @foreach ($products as $product)
                <div class="item">
                    <div class="product-img">
                        <a href="{{ route('detail', $products[$i]['slug']) }}">
                            <img src="{{$products[$i]['image'][0]??'/images/product-jawda.jpg'}}" alt="">
                            <span class="icon-basket fontello"></span>
                        </a>
                    </div>
                    <h5>
                        @php    
                            echo substr("{$products[$i]['name']}",0,20).'....';
                        @endphp
                    </h5>
                    @if ($products[$i]['discount'] != $products[$i]['price'])
                        <span>Rp. {{number_format($products[$i]['discount'])}}</span><del>Rp. {{number_format($products[$i]['price'])}}</del>
                    @else
                        <span>Rp. {{number_format($products[$i]['price'])}}</span>
                    @endif
                </div>
                @php
                    $i++;
                @endphp
                @endforeach
                
            </div>
        </div>
        <div class="product-single">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="product-single-left bg-skin text-white">
                        <div class="product-single-detail">
                            <h2>KOPI BERKUALITAS <span>DUNIA</span></h2>
                            <p>Untuk kami kualitas biji kopi adalah kunci utama dari sebuah kenikmatan.</p>
                            <div class="item-product">
                                <img src="images/img10.png" alt="" class="animated">
                            </div>
                            <a href="{{ route('produk') }}" class="button-default button-default-white margin-top-30">Explore Full Product</a>
                        </div>
                    </div>        
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="owl-carousel owl-theme" data-items="1" data-tablet="1" data-mobile="1" data-nav="false" data-dots="true" data-autoplay="true" data-speed="1300" data-autotime="6000">
                        @if (isset($promos)&&count($promos)>0)
                        @foreach ($promos as $promo)
                            <div class="item dp-animation">
                                <div class="product-single-right">
                                    <img src="{{$promo->slider}}" alt="" class="animated">
                                </div>
                            </div>
                        @endforeach
                        @else
                            <div class="item dp-animation">
                                <div class="product-single-right">
                                    <img src="images/img9.png" alt="" class="animated">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Item list Part -->

<!-- Start Feature Part -->

<section class="default-section bg-grey">
    <div class="container">
        <div class="title text-center">
            <h2 class="text-coffee">News &amp; Learn</h2>
            <h6>Belajar Kopi &amp; Berita Kopi Terbaru Kami</h6>
        </div>
        <div class="feature-blog">
            <div class="owl-carousel owl-theme" data-items="3" data-tablet="2" data-mobile="1" data-nav="true" data-dots="false" data-autoplay="true" data-speed="2500" data-autotime="6000">
                @php
                    $i=0;
                @endphp
                @foreach ($posts as $post)
                    <div class="item dp-animation">
                        <div class="feature-img">
                            <img src="{{$post->image??'/images/blog.jpg'}}" alt="" class="animated">
                            <div class="date-feature" style="font-size: 18px; width: 70px;"> {{date_format (new DateTime($post->created_at), 'd')}} <small style="font-size: 16px;">{{date_format(new DateTime($post->created_at), 'M')}}</small></div>
                        </div>
                        <div class="feature-info">
                            <span><i class="icon-user-1"></i> {{$post->name}}</span>
                            <span><i class="icon-comment-5"></i> {{$post->total_comment}} Comments</span>
                            <h5>
                                <a style="color: black;" href="{{route('detail_post', $post->slug)}}">
                                    @php    
                                        echo substr("{$post->tittle}",0,20).'....';
                                    @endphp
                                </a>
                            </h5>
                            <p>{!!substr($post->post,0,800)!!}</p>
                            <a href="{{ route('detail_post',$post->slug) }}">Read More <i class="icon-right-4"></i></a>
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- End Feature Part -->


<!-- Start Gallery With Sllider -->

<section class="default-section pad-top-remove">
    <div class="container">
        <div class="title text-center">
            <br>
            <h2 class="text-primary">#jawdacoffee</h2>
            <h6 class="text-turkish">Enjoyed your stay at Jawda? Share your moments with us. Follow us on Instagram and use</h6>
        </div>
    </div>
    <div class="gallery-slider">
        <div class="owl-carousel owl-theme" data-items="5" data-tablet="4" data-mobile="1" data-nav="true" data-dots="false" data-autoplay="true" data-speed="2000" data-autotime="3000">
            @foreach ($galleries as $gallery)
            <div class="item dp-animation">
            <a href="{{$gallery->image}}" class="magnific-popup">
                <!-- <img src="{{$gallery->image}}" alt="" class="animated-responsive"> -->
                <div style="background-image: url({{$gallery->image}}); background-size: cover; width: 215px; height: 100px;" alt="" class="animated-responsive"></div>
                <div class="gallery-overlay">
                    <div class="gallery-overlay-inner">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                </div>
            </a>
            </div>
            @endforeach             
        </div>
    </div>
</section>
<!-- End Main Part -->

        <!-- Start Footer Part -->

        <footer>
            <div class="footer-part">
                <div class="footer-inner-info Banner-Bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="logo">
                                    <a href="index.html"><span>Thank u</span><small>Support Local Farm</small></a>
                                </div><br><br>
                                <p>Jawda Coffee merupakan bagian dari Petani Lokal Lampung yang memiliki visi sederhana yaitu menjadikan petani lokal menjadi tuan rumah di negeri sendiri.</p>
                                <ul class="footer-social">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h5>Customer Care</h5>
                                <p>
                                    @if (isset($menu_customers))
                                    @foreach ($menu_customers as $menu)
                                        <a href="{{ route('menu',$menu->slug) }}"><li>{{$menu->menu}}</li></a>
                                    @endforeach
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h5>Bantuan</h5>
                                <p>
                                    {{-- <li>Pengiriman</li>
                                    <li>Panduan Pembayaran</li>
                                    <li>Panduan Berbelanja</li>
                                    <li>Syarat dan Ketentuan</li>
                                    <li>Kebijakan Privasi</li>
                                    <li>Garansi</li> --}}
                                    @if (isset($menu_helps))
                                    @foreach ($menu_helps as $menu)
                                    <a href="{{ route('menu',$menu->slug) }}"><li>{{$menu->menu}}</li></a>
                                    @endforeach
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <h5> Jawda Video</h5>
                                <a href="https://www.youtube.com/watch?v=5Dib_af3_lQ" class="magnific-youtube video-footer"><img src="images/video-bg.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <p>Copyright © 2020 Jawda Coffee. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>  

        <!-- End Footer Part -->

    </div>

    <!-- End Wrapper Part -->

    <!-- Back To Top Arrow -->

    <a href="#" class="top-arrow"></a>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/bootstrap/bootstrap-slider.js"></script>
    <script src="js/revolution-plugin/jquery.themepunch.plugins.min.js"></script>
    <script src="js/revolution-plugin/jquery.themepunch.revolution.min.js"></script>
    <script src="js/parallax-stellar/jquery.stellar.js"></script>
    <script src="js/animation/wow.min.js"></script>
    <script src="js/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/light-box/simple-lightbox.min.js"></script>
    <script src="js/light-box/jquery.magnific-popup.min.js"></script>
    <script src="js/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/masonry/isotop.js"></script>
    <script src="js/masonry/packery-mode.pkgd.min.js"></script>
    <script src="js/form-field/jquery.formstyler.min.js"></script>
    <script src="js/Slick-slider/slick.min.js"></script>
    <script src="js/progress-circle/waterbubble.min.js"></script>
    <script src="js/app.js"></script>
    <script src="/js/script.js"></script>
    
    <!-- Wa -->    
    <a a href="https://api.whatsapp.com/send?phone=6282175411367&text=Hi%20Jawda,%20saya%20mau%20bertanya%20?" class="float whatsapp" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
    </a>
    </body>
</html>
