@extends('layouts._layouts')
@section('title')
Blog
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
                <li class="active"><a href="#">Blog</a></li>
            </ul>
            <label class="now">BLOG</label>
        </div>
    </div>
</section>

<!-- Start Blog List -->   

<section class="default-section blog-main-section text-center blog-main-2col">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="blog-right-section">
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="blog-right-listing">
                                <div class="feature-img">
                                    <img src="{{$post->image ??'https://fakta.news/wp-content/uploads/2017/08/cara-minum-kopi-yang-benar.jpg'}}" alt="">
                                    <div class="date-feature"> <br>{{date_format (new DateTime($post->created_at), 'd')}} <small>{{date_format(new DateTime($post->created_at), 'M')}}</small></div>
                                </div>
                                <div class="feature-info">
                                    <span><i class="icon-user-1"></i> {{$post->nama}}</span>
                                    <h5>
                                        @php    
                                            echo substr("{$post->tittle}",0,20).'....';
                                        @endphp
                                    </h5>
                                    <p>{!!substr($post->post,0,800)!!}</p>
                                    <a href="{{ route('detail_post', $post->slug) }}" class="button-default">Read More <i class="icon-right-4"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="gallery-pagination" id="paginasi">
                        <div class="gallery-pagination-inner">
                            {{ $posts->links('pagination::default') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')

@endsection