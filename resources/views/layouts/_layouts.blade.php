<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">

    <title>@yield('title') | Jawda Coffee</title>

    <!-- SEO -->
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="@yield('author')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SEO -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="images/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Pacifico|Quicksand:300,400,500,700|Source+Sans+Pro:400,600,700" rel="stylesheet">
    <link href="/css/icon-plugin/font-awesome.css" rel="stylesheet">
    <link href="/css/icon-plugin/fontello.css" rel="stylesheet">
    <link href="/css/revolution-plugin/extralayers.css" rel="stylesheet">
    <link href="/css/revolution-plugin/settings.css" rel="stylesheet">
    <link href="/css/bootstrap-plugin/bootstrap.css" rel="stylesheet">
    <link href="/css/bootstrap-plugin/bootstrap-slider.css" rel="stylesheet">
    <link href="/css/animation/animate.min.css" rel="stylesheet">
    <link href="/css/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl-carousel/owl.theme.default.css" rel="stylesheet">
    <link href="/css/light-box/simplelightbox.css" rel="stylesheet">
    <link href="/css/light-box/magnific-popup.css" rel="stylesheet">
    <link href="/css/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet">
    <link href="/css/form-field/jquery.formstyler.css" rel="stylesheet">
    <link href="/css/Slick-slider/slick-theme.css" rel="stylesheet">
    <link href="/css/theme.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    @yield('head')

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
                                <a href="{{ route('home') }}"><img src="/images/logo-web.png" width="200px" height="56px" alt="Jawda"></a>
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
                                                <a href="{{ route('menu',$menu->menu) }}">{{$menu->menu}}</a>
                                            </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="header-search">
                                    <input type="text" name="txt">
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
        <br>
    <br>
        <br>
            <br>

        <!-- Start Main Part -->

        <main>
            <div class="main-part">
                @yield('content')
            </div>
        </main>
        <footer>
            <div class="footer-part">
                <div class="footer-inner-info Banner-Bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="logo">
                                    <a href="{{ route('home') }}"><span>Thank u</span><small>Support Local Farm</small></a>
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
                                    {{-- <li>Hubungi Kami</li>
                                    <li>Wholesale</li>
                                    <li>Konfirmasi Pembayaran</li>
                                    <li>FAQ / Bantuan</li>
                                    <li>Tentang Kami</li>
                                    <li>Mengapa Kami</li> --}}
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
                                <a href="https://www.youtube.com/watch?v=5Dib_af3_lQ" class="magnific-youtube video-footer"><img src="/images/video-bg.png" alt=""></a>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="/js/bootstrap/bootstrap-slider.js"></script>
    <script src="/js/revolution-plugin/jquery.themepunch.plugins.min.js"></script>
    <script src="/js/revolution-plugin/jquery.themepunch.revolution.min.js"></script>
    <script src="/js/parallax-stellar/jquery.stellar.js"></script>
    <script src="/js/animation/wow.min.js"></script>
    <script src="/js/owl-carousel/owl.carousel.min.js"></script>
    <script src="/js/light-box/simple-lightbox.min.js"></script>
    <script src="/js/light-box/jquery.magnific-popup.min.js"></script>
    <script src="/js/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/js/masonry/isotop.js"></script>
    <script src="/js/masonry/packery-mode.pkgd.min.js"></script>
    <script src="/js/form-field/jquery.formstyler.min.js"></script>
    <script src="/js/Slick-slider/slick.min.js"></script>
    <script src="/js/progress-circle/waterbubble.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/script.js"></script>
      
      <!-- Wa -->    
<a a href="https://api.whatsapp.com/send?phone=6282175411367&text=Hi%20Jawda,%20saya%20mau%20bertanya%20 fdi?" class="float whatsapp" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
@yield('script')
  </body>
</html>