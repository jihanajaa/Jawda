@extends('layouts._layouts')
@section('title')
Contact
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
                <li class="active"><a>Contact</a></li>
            </ul>
            <label class="now">Contact</label>
        </div>
    </div>
</section>

<!-- Start Contact Part -->

<section class="default-section contact-part pad-top-remove">
    <div class="map-outer">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.368257095741!2d104.4048823149635!3d-5.043899752687834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e477b39e564032d%3A0x9fad7dacafef806e!2sJawda%20Coffee!5e0!3m2!1sid!2sid!4v1598809839213!5m2!1sid!2sid" width="100%" height="500px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <div class="container">
        <div class="title text-center">
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h5 class="text-coffee">Leave us a Message</h5>
                <p>Jadikan kegiatan berbelanja anda lebih bermakna, karena setiap pembelian yang anda lakukan, merupakan dukungan nyata bagi pertanian Indonesia.</p>
                <form class="form" method="post" action="{{ route('postMessage') }}">@csrf
                    {{-- <div class="alert-container"></div> --}}
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Name *</label>
                            <input name="name" type="text" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Email *</label>
                            <input name="email" type="email" required>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label>Subject *</label>
                            <input name="subject" type="text" required>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>Your Message *</label>
                            <textarea name="message" required></textarea>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input name="submit" value="SEND MESSAGE" class="submit-btn" type="submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <address>
                    <span class="text-primary co-title">Our Address</span>
                    <p>Jl. Lintas Liwa No.5-6, Pura Laksana, Way Tenong, Kabupaten Lampung Barat, Lampung 34884</p>
                    <p><a target="_blank" href="https://api.whatsapp.com/send?phone=6282175411367&text=Hi%20Jawda,%20saya%20mau%20bertanya%20%20fdi?">+62 821-754-11367</a> <br> <a href="mailto:info@jawda.id">info@jawda.id</a></p>
                </address>
                <h5 class="text-coffee">Opening Hours</h5>
                <ul class="time-list">
                    <li><span class="week-name">Monday</span> <span>09:00 am - 15:00 pm</span></li>
                    <li><span class="week-name">Tuesday</span> <span>09:00 am - 15:00 pm</span></li>
                    <li><span class="week-name">Wednesday</span> <span>09:00 am - 15:00 pm</span></li>
                    <li><span class="week-name">Thursday</span> <span>09:00 am - 15:00 pm</span></li>
                    <li><span class="week-name">Friday</span> <span>09:00 am - 15:00 pm</span></li>
                    <li><span class="week-name">Saturday</span> <span>09:00 am - 15:00 pm</span></li>
                    <li><span class="week-name">Sunday</span> <span>Closed</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- End About List -->
@endsection
@section('script')

@endsection