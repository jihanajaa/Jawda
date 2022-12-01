@extends('layouts._layouts')
@section('title')
Agen
@endsection
@section('description')
@endsection
@section('keyword')
@endsection
@section('author')
@endsection
@section('content')
<section class="breadcrumb-nav">
    <div class="container">
        <div class="breadcrumb-nav-inner">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active"><a>Agen</a></li>
            </ul>
            <label class="now">AGEN</label>
        </div>
    </div>
</section>

<!-- Start Service List -->   

<section class="default-section service-main">
    <div class="container">
        <div class="row">
            @foreach ($agents as $agent)
            <div class="col-md-3 col-sm-4 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="700ms">
                <div class="service-list">
                    <div class="service-list-front">
                        <div class="service-icon-in">
                            <div class="service-icon">
                                <img src="images/map_marker.png" alt="">
                            </div>
                        </div>
                        <h3 class="text-dark">{{$agent->location}}</h3>
                    </div>
                    <div class="service-list-back Banner-Bg" data-background="images/img13.png">
                        <div class="service-back-in">
                            <div class="service-icon-back">
                                <img src="images/logo-icon.png" alt="">
                            </div>
                        </div>
                        <h3>{{$agent->location}}</h3>
                        <p>Agen {{$agent->name}} yang berdomisili di {{$agent->location}} mempunyai paket {{$agent->package}}</p>
                        <br>                                        
                        <div class="col-md-3 col-sm-3 col-xs-12">
                        <a href="https://api.whatsapp.com/send?phone={{$agent->phone}}&text=Hi%20Jawda,%20saya%20mau%20bertanya%20 fdi?" class="button-default margin-bottom-40 button-dark-red">Hubungi</a>
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach                         
        </div>
    </div>
</section>

<!-- End Service List -->

<!-- CTA Daftar Agen -->   

<section class="default-section shop-cart bg-grey">
    <div class="container">
        
        <div class="track-oder wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="track-oder-inner">
                <div class="clock-track-icon">
                    <img src="images/jawda-org.png" width="200px" height="233px" alt="">
                </div>
                <div class="track-status">
                    <h3><span>Ingin Jadi Agen Kami ?</span> <br> &amp; support para petani lokal !</h3>
                    <br>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                <a href="{{ route('daftar-agen') }}" class="button-default margin-bottom-40 button-dark-red">Daftar</a>
            </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End CTA Daftar Agen -->
<!-- End About List -->
@endsection
@section('script')

@endsection