@extends('layouts._layouts')
@section('title')
Search results...
@endsection
@section('description')
@endsection
@section('keyword')
@endsection
@section('author')
@endsection
@section('content')
<section class="default-section wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="container">
        <div class="title text-center">
            <h3 class="text-coffee">Search Results</h3>
        </div>
        <div class="row" id="products">
            <div class="title text-center">
                <h5 class="text-coffee">Products</h5>
            </div>
            @foreach ($products as $product)
            <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="shop-main-list">
                    <div class="shop-product">
                        <img src="{{$product->image ?? '/images/product-jawda.jpg'}}" alt="">
                        <div class="cart-overlay-wrap">
                            <div class="cart-overlay">
                                <a href="{{ route('detail', $product->slug) }}" class="shop-cart-btn">BELI</a>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('detail', $product->slug) }}"><h5>{{$product->name}}</h5></a>
                    @if ($product->discount != $product->price)
                    <div style="display: flex;">
                        <h5><strong>Rp. {{number_format($product->discount)}} </strong></h5> &nbsp; &nbsp; <del> Rp. {{number_format($product->price)}}</del>
                    </div>
                    @else
                    <h5><strong>Rp. {{number_format($product->price)}}</h5></strong>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="default-section blog-main-section text-center blog-main-2col">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h5 class="text-coffee">Blog or Recipe</h5>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="blog-right-section">
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="blog-right-listing">
                                <div class="feature-img">
                                    <img src="{{$post->image ??'https://fakta.news/wp-content/uploads/2017/08/cara-minum-kopi-yang-benar.jpg'}}" alt="">
                                    <div class="date-feature"> <br>{{date_format (new DateTime($post->created_at), 'd')}} <small>{{date_format(new DateTime($post->created_at), 'F')}}</small></div>
                                </div>
                                <div class="feature-info">
                                    <span><i class="icon-user-1"></i> {{$post->name}}</span>
                                    <h5>{{$post->tittle}}</h5>
                                    <p>{!!substr($post->post,0,800)!!}</p>
                                    <a href="{{ route('detail_post', $post->id) }}" class="button-default">Read More <i class="icon-right-4"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End About List -->
@endsection
@section('script')

@endsection