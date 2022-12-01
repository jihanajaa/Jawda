@extends('layouts._layouts')
@section('title')
Terms & Condition
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
                <li class="active"><a>Terms &amp; Conditions </a></li>
            </ul>
            <label class="now">TERMS &amp; CONDITIONS</label>
        </div>
    </div>
</section>

<section class="default-section">
    <div class="container">
        <div class="col-md-9 col-sm-8 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="terms-left">
                <h5>Intellectual Propertly</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum. Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim. Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum. Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus. Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue. Pellentesque vitae eros eget enim mollis placerat.</p>
                <h5>Termination</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum. Leo metus luctus sem, vel vulputate diam ipsum sed lorem. Donec tempor arcu nisl, et molestie massa scelerisque ut. Nunc at rutrum leo. Mauris metus mauris, tristique quis sapien eu, rutrum vulputate enim. Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum. Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus. Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue. Pellentesque vitae eros eget enim mollis placerat.</p>
                <h5>Changes To This Agreement</h5>
                <p>We reserve the right, at our sole discretion, to modify or replace these Terms and Conditions by posting the updated terms on the Site. Your continued use of the Site after any such changes constitutes your acceptance of the new Terms and Conditions.</p>
                <h5>Contact Us</h5>
                <p>If you have any questions about this Agreement, please contact us filling this contact form</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
            <div class="terms-right">
                <ul>
                    <li><a href="about.html">About</a></li>
                    <li class="active"><a href="terms_condition.html">Terms &amp; Conditions</a></li>
                    <li><a href="{{ route('whyus') }}">Mengapa Kami</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="{{ route('produk') }}">Produk</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')

@endsection