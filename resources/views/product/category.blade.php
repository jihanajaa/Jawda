@extends('layouts._layouts')
@section('title')
Category
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
                <li><a href="index.html">Home</a></li>
                <li class="active"><a href="#">Shop</a></li>
            </ul>
            <label class="now">SHOP</label>
        </div>
    </div>
</section>

<!-- Start Blog List -->   

<section class="default-section shop-page">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="blog-left-section">
                    <div class="blog-left-search blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <input type="text" name="txt" placeholder="Search">
                        <input type="submit" name="submit" value="&#xf002;">
                    </div>
                    <div class="blog-left-categories blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <h5>Categories</h5>
                        <ul class="list">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('product_category', $category->category) }}">{{$category->category}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="blog-left-deal blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <h5>Best Seller</h5>
                        @if (isset($best_sellers))
                            @foreach ($best_sellers as $best_seller)
                                @if ($best_seller->price != 0)    
                                <div class="best-deal-blog">
                                    <div class="best-deal-left">
                                        <img src="{{$best_seller->image ?? 'https://awsimages.detik.net.id/community/media/visual/2018/07/25/22193128-89fe-4903-aac0-e0f6ea45dbff_169.jpeg?w=620'}}" alt="">
                                    </div>
                                    <div class="best-deal-right">
                                        <p>
                                            @php    
                                                echo substr("{$best_seller->name}",0,20).'....';
                                            @endphp
                                        </p>
                                        @if ($best_seller->discount == $best_seller->price)
                                            <span>Rp. {{number_format($best_seller->price)}}</span>
                                        @else
                                            <span>Rp. {{number_format($best_seller->discount)}}</span> <del>Rp. {{number_format($best_seller->price)}}</del>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="blog-right-section">
                    <div class="shop-search wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <h6>Show category {{ $nama_category }}</h6>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="filter" name="filter" class="select-dropbox">
                                    <option value="0">Sort</option>
                                    <option value="1">Sort by newness</option>
                                    <option value="2">Lower Price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="products">
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
                                <a href="{{ route('detail', $product->id) }}"><h5>
                                    @php    
                                        echo substr("{$product->name}",0,20).'....';
                                    @endphp</h5></a>
                                @if ($product->discount == $product->price)
                                <h5><strong>Rp. {{number_format($product->price)}}</h5></strong>
                                @else
                                <div style="display: flex;">
                                    <h5><strong>Rp. {{number_format($product->discount)}} </strong></h5> &nbsp; &nbsp; <del> Rp. {{number_format($product->price)}}</del>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="gallery-pagination" id="paginasi">
                        <div class="gallery-pagination-inner">
                            {{ $products->links('pagination::default') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About List -->
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#filter').change(function(){
            $('#products').fadeOut(2000);
            var filter = $(this).children("option:selected").val();
            $.ajax({
                type: 'GET',
                url: '/produk/filter',
                data: {'filter': filter},
                success: function (data) {
                    console.log(data[0].name);
                    $('#paginasi').empty();
                    $('#products').empty();
                    $('#products').hide();
                    for (var i=0; i<data.length; i++) {
                        var image=null;
                        var prices;
                        if(data[i].image==null){
                            var image='https://awsimages.detik.net.id/community/media/visual/2018/07/25/22193128-89fe-4903-aac0-e0f6ea45dbff_169.jpeg?w=620';
                        }else{
                            var image=data[i].image;
                        }

                        if (data[i].discount!=null) {
                            var prices="<div style='display:flex;'><h5><strong>Rp. "+data[i].discount+"</strong></h5> &nbsp; &nbsp; <del>Rp. "+data[i].price+"</del></div>"
                        } else {
                            var prices="<h5><strong>Rp. "+data[i].price+"</h5></strong>"
                        }
                        $('#products').append("<div class='col-md-4 col-sm-4 col-xs-12 wow fadeInDown' data-wow-duration='1000ms' data-wow-delay='300ms'>"
                            +"<div class='shop-main-list'>"+
                                "<div class='shop-product'>"+
                                    "<img src='"+image+"' alt=''>"+
                                    "<div class='cart-overlay-wrap'>"+
                                        "<div class='cart-overlay'>"+
                                            "<a href='#' class='shop-cart-btn'>BELI</a>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"+
                                "<a href=''><h5>"+data[i].name+"</h5></a>"+
                                prices+
                            "</div>"+
                        "</div>");
                    }
                    $('#products').fadeIn(1000);
                },
                error: function (data) {
                }
            });
        });
    });
</script>
@endsection