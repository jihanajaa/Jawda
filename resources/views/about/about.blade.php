@extends('layouts._layouts')
@section('title')
About
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
            <ul class="link-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active"><a>About</a></li>
            </ul>
            <label class="now">ABOUT</label>
        </div>
    </div>
</section>

<!-- Start About List -->   

<section class="default-section about">
    <div class="container">
        <div class="photo-mobile col-md-6 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <img src="images/about-img.png" alt="">
        </div>
        <div class="title text-center">
            <h2 class="text-coffee">Welcome To Jawda Coffee</h2>
            <h6>support local farmers</h6>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <p>Jawda Coffee merupakan bagian dari Petani Lokal Lampung yang memiliki visi sederhana yaitu menjadikan petani lokal menjadi tuan rumah di negeri sendiri. Melalui Jawda Anda tidak hanya mendukung pertumbuhanan dan perkembangan Industri pertanian, namun Anda juga membantu menjaga kesejahteraan para petani kopi Lampung. 
                    <br> <br>
                    Jadikan kegiatan berbelanja anda lebih bermakna, karena setiap pembelian yang anda lakukan, merupakan dukungan nyata bagi pertanian Indonesia.</p>
                <div class="nto"><span>Lina Tuzzahro</span> <br> <small>Lina Tuzzahro / CEO</small></div>
                <p><a href="product.html" class="submit-btn belanja-sekarang">Belanja Sekarang</a></p>
            </div>
            <div class="photo-website col-md-6 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/about-img.png" alt="">
            </div>
        </div>
    </div>
</section>

<!-- End About List -->
@endsection
@section('script')

@endsection