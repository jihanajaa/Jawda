@extends('layouts._layouts')
@section('title')
Daftar Agen
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
                <li class="active"><a>Daftar Agen</a></li>
            </ul>
            <label class="now">DAFTAR AGEN</label>
        </div>
    </div>
</section>

<!-- Start Login & Register -->   

<section class="default-section login-register bg-agen">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="register-wrap form-common">
                    <div class="title text-center">
                        <h3 class="text-coffee">Register</h3>
                    </div>
                    <form class="register-form" method="post" name="register" action="{{ route('postDaftarAgen') }}">@csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="name" placeholder="Nama Lengkap" class="input-fields" required>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="toko" placeholder="Cafe / Toko" class="input-fields" required>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="email" placeholder="emailanda@gmail.com" class="input-fields" required>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                 <input type="txt" name="city" placeholder="Kota" class="input-fields" required>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="txt" name="phone" placeholder="Hp" class="input-fields" required>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="txt" name="package" placeholder="Paket" class="input-fields" required>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="submit" name="submit" class="button-default button-default-submit" value="Daftar Sekarang">
                            </div>
                        </div>
                    </form>
                    <p>By clicking on “Daftar Sekarang” button you are accepting the <a href="{{ route('terms') }}" target="_blank">Terms &amp; Conditions</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- End About List -->
@endsection
@section('script')

@endsection