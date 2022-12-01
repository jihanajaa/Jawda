@extends('layouts._layouts')
@section('title')
{!!$products[0]->name!!}
@endsection
@section('head')
<style type="text/css">
    #description_product ul li, #description_product ol li {
        list-style: disc;
    }
</style>
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
            <label class="now now-mobile">{{$products[0]->name}}</label>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('produk') }}">Product</a></li>
                <li class="active"><a href="#">{{$products[0]->name}}</a></li>
            </ul>
            <label class="now now-website">{{$products[0]->name}}</label>
        </div>
    </div>
</section>

<!-- Start Shop Single -->   

<section class="default-section shop-single pad-bottom-remove">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="slider slider-for slick-shop">
                    @foreach ($images as $image)
                        <div>
                            <img src="{{$image->image}}" alt="">
                        </div>
                    @endforeach
                </div>
                <div class="slider slider-nav slick-shop-thumb">
                    @foreach ($images as $image)
                        <div><img src="{{$image->image}}" alt=""></div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h3 class="text-coffee">{{$products[0]->name}}</h3>
                @if ($products[0]->discount == $products[0]->price )
                    <h5 class="text-coffee">Rp {{number_format($products[0]->price)}} / {{$products[0]->per_price}}</h5>
                @else
                    <h5 class="text-coffee">Rp {{number_format($products[0]->discount)}} <del>Rp {{number_format($products[0]->price)}}</del>/ {{$products[0]->per_price}}</h5>
                @endif
                <p>
                    <li>Product ID : <strong>{{$products[0]->product_id}}</strong></li>
                    <li>Product Pack : <strong>{{$products[0]->product_pack}}</strong></li>
                    <li>Roasting : <strong>{{$products[0]->roasting}}</strong></li>
                    <li>Processing Method : <strong>{{$products[0]->processing_method}}</strong></li>
                    <hr>
                    <li>Altitude : <strong>{{$products[0]->altitude}}</strong></li>
                    <li>Kadar Air : <strong>{{$products[0]->water_content}}</strong></li>
                    <li>Variety : <strong>{{$products[0]->variety}}</strong></li>
                    <li>Aroma : <strong>{{$products[0]->aroma}}</strong></li>
                    <li>Acidity : <strong>{{$products[0]->acidity}}</strong></li>
                    <li>Body : <strong>{{$products[0]->body}}</strong></li>
                    <li>Flavour : <strong>{{$products[0]->flavour}}</strong></li>
                </p>
                
                <button data-toggle="modal" data-target="#exampleModal" class="filter-btn btn-large"><i class="fa fa-shopping-bag" aria-hidden="true"></i>BELI SEKARANG</button>
                <div class="share-tag">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="social-wrap">
                                <h5>SHARE</h5>
                                <ul class="social">
                                    <li class="social-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u={{route('detail', $products[0]->slug)}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li class="social-tweeter"><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{route('detail', $products[0]->slug)}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li class="social-whatsapp"><a href="https://wa.me/?text=Kunjungi yaa.. {{route('detail', $products[0]->slug)}}" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Shop Single -->

<!-- Start Tab Part -->

<section class="default-section comment-review-tab bg-grey v-pad-remove wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="container">
        <div class="tab-part">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#description" aria-controls="description" role="tab" data-toggle="tab">About Bean</a>
                </li>
                <li role="presentation">
                    <a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews ( {{$total_comment}} )</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="description">
                    <div class="title text-left">
                        <h3 class="text-coffee">{{$products[0]->name}}</h3>
                    </div>
                    <div id="description_product">{!!$products[0]->about!!}</div>
                </div>
                <div role="tabpanel" class="tab-pane" id="reviews">
                    <div class="title text-center">
                        <h3 class="text-coffee">{{$total_comment}} Comment</h3>
                    </div>
                    <div class="comment-blog">
                        @foreach ($comments as $comment)
                            <div class="comment-inner-list">
                                <div class="comment-img">
                                    <img src="/images/comment-img1.png" alt="">
                                </div>
                                <div class="comment-info">
                                    <h5>{{$comment->name}}</h5>
                                    <span class="comment-date">{{date('F, d Y h:i:s A',strtotime($comment->created_at))}}</span>
                                    <p>{{$comment->comment}}</p>
                                </div>
                            </div>                              
                        @endforeach                      
                        <div class="title text-center">
                            <h3 class="text-coffee">Leave a Reply</h3>
                        </div>
                        <form class="form" action="{{ route('postComment') }}" method="post" name="form">@csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{$products[0]->id}}">
                                <input type="hidden" name="slug" value="{{$products[0]->slug}}">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea placeholder="Comment" name="comment"></textarea>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="name" placeholder="Name" type="text">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="email" placeholder="Email" type="email">
                                </div>
                                {{-- <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="star-review">
                                        <p>
                                            <span>Your Rating</span>
                                            <span class="star-review-customer">
                                                <a href="#" class="star-1"></a>
                                                <a href="#" class="star-2"></a>
                                                <a href="#" class="star-3"></a>
                                                <a href="#" class="star-4"></a>
                                                <a href="#" class="star-5"></a>
                                            </span>
                                        </p>
                                    </div>
                                </div> --}}
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <input name="submit" value="POST COMMENT" class="submit-btn" type="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Tab Part -->

<section class="default-section wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="container">
        <div class="title text-center">
            <h3 class="text-coffee">Related Products</h3>
        </div>
        <div class="product-wrapper">
            <div class="owl-carousel owl-theme" data-items="4" data-tablet="3" data-mobile="2" data-nav="false" data-dots="true" data-autoplay="true" data-speed="1800" data-autotime="5000">
                @foreach ($relateds as $related)
                <div class="item">
                    <div class="product-img">
                        <a href="{{ route('detail', $related->slug) }}">
                            <img src="{{$related->image}}" alt="">
                            <span class="icon-basket fontello"></span>
                        </a>
                    </div>
                    <h5>
                        @php    
                            echo substr("{$related->name}",0,20).'....';
                        @endphp    
                    </h5>
                    @if ($related->discount == $related->price)
                        <span>Rp. {{number_format($related->price)}}</span>
                    @else
                        <span>Rp. {{number_format($related->discount)}}</span> <del>Rp. {{number_format($related->price)}}</del>
                    @endif
                </div>    
                @endforeach
            </div>
        </div>
    </div>

    <div class="side-mobile side-bar-responsive blog-left-categories blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <h5>Categories</h5>
        <ul class="ul-list">
            @foreach ($categories as $category)
                <li><a href="{{route('product_category', $category->category)}}">{{$category->category}}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="side-mobile side-bar-responsive blog-left-deal blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <h5>Best Seller</h5>
        @if (isset($best_sellers))
            @foreach ($best_sellers as $best_seller)
                @if ($best_seller->price != 0)    
                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInDown shop-main-list-responsive best-seller-responsive" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="shop-main-list">
                        <div class="shop-product">
                            <img src="{{$best_seller->image ?? 'https://awsimages.detik.net.id/community/media/visual/2018/07/25/22193128-89fe-4903-aac0-e0f6ea45dbff_169.jpeg?w=620'}}" alt="">
                        </div>
                        <h4>
                            @php    
                                echo substr("{$best_seller->name}",0,20).'....';
                            @endphp
                        </h4>
                        @if ($best_seller->discount == $best_seller->price)
                            <h4><strong>Rp. {{number_format($best_seller->price)}}</strong></h4>
                        @else
                        <div style="display: flex;">
                            <h4><strong>Rp. {{number_format($best_seller->discount)}}</strong></h4> &nbsp; &nbsp; <del>Rp. {{number_format($best_seller->price)}}</del>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            @endforeach
        @endif
    </div>

</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
                <h6 class="modal-title" id="exampleModalLabel">Pilih Merchant Untuk Membeli</h6>
            </div>
            <div class="modal-body">
                <div style="text-align: center;">
                    <ul>
                        @foreach ($merchants as $merchant)
                            <a href="{{$merchant->link}}" target="_blank"><li><img src="{{$merchant->icon}}" style="max-width: 100px" alt="{{$merchant->name}}"></li></a>
                        @endforeach
                    </ul>          
                </div>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/share.js') }}"></script>
@endsection