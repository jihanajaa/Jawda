@extends('layouts._layouts')
@section('title')
{!!$post->tittle!!}
@endsection
@section('description')
{!!$post->post!!}
@endsection
@section('keywords')
@endsection
@section('author')
{!!$post->nama!!}
@endsection
@section('content')
<div class="main-part">
    <section class="breadcrumb-nav">
        <div class="container">
            <div class="breadcrumb-nav-inner">
                <label class="now now-mobile">{{$post->tittle}}</label>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li class="active"><a>{{$post->tittle}}</a></li>
                </ul>
                <label class="now now-website">{{$post->tittle}}</label>
            </div>
        </div>
    </section>

    <!-- Start Blog List -->   

    <section class="default-section blog-main-section blog-single">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="blog-left-section">
                        <div class="blog-left-search blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <input type="text" name="txt" placeholder="Search">
                            <input type="submit" name="submit" value="&#xf002;">
                        </div>
                        @if (isset($categories)&&count($categories)>0)
                        <div class="blog-left-categories blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <h5>Categories</h5>
                            <ul class="list">
                                @foreach ($categories as $category)
                                    <li><a>{{$category->category}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (isset($other_posts)&&count($other_posts)>0)
                        <div class="blog-recent-post blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <h5>Recent Posts</h5>
                            @foreach ($other_posts as $other_post)
                            <a href="{{ route('detail_post', $other_post->id) }}">
                                <div class="recent-blog-list">
                                    <p><img src="{{$other_post->image ?? '/images/img18.png'}}" alt=""></p>
                                    <p><small>{{date('F d, Y',strtotime($other_post->created_at))}}</small></p>
                                    <h6>{{$other_post->tittle}}</h6>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        @endif
                        @if (isset($tags)&&count($tags)>0)
                        <div class="popular-tag blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <h5>Popular Tags</h5>
                            @foreach ($tags as $tag)
                                <a>{{$tag->tag}}</a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="blog-right-section">
                        <div class="blog-right-listing">
                            <div class="feature-img wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <img src="images/img39.png" alt="">
                                {{-- <div class="date-feature">27 <br> <small>may</small></div> --}}
                            </div>
                            <div class="feature-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                                
                                <img src="{{$images->image}}" style="margin-bottom: 30px;"><br>

                                <span><i class="icon-user-1"></i> {{$post->nama}}</span>
                                {{-- <span><i class="icon-comment-5"></i> 5 Comments</span> --}}
                                <h5>{{$post->tittle}}</h5>
                                <p>
                                    {!! $post->post!!}
                                </p>
                                <div class="share-tag">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="social-wrap">
                                                <h5>SHARE</h5>
                                                <ul class="social">
                                                    <li class="social-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u={{route('detail', $post->slug)}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li class="social-tweeter"><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{route('detail', $post->slug)}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li class="social-whatsapp"><a href="https://wa.me/?text=Kunjungi yaa.. {{route('detail', $post->slug)}}" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="tag-wrap">
                                                <h5>TAGS</h5>
                                                @php
                                                    $tags_label=explode(',',$post->tag);
                                                @endphp
                                                @for ($i = 0; $i < count($tags_label); $i++)
                                                    <a class="tag-btn">{{$tags_label[$i]}}</a>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <p><a href="" class="plain-btn"><i class="icon-left-4"></i>Music for Dinner – Audio Player</a></p> --}}
                            </div>
                            <div class="comment-blog wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <h3>{{$total_comment}} Comment</h3>
                                @foreach ($comments as $comment)
                                    <div class="comment-inner-list">
                                        <div class="comment-img">
                                            <img src="images/comment-img1.png" alt="">
                                        </div>
                                        <div class="comment-info">
                                            <h5>{{$comment->name}}</h5>
                                            <span class="comment-date">{{date('F, d Y h:i:s A',strtotime($comment->created_at))}}</span>
                                            <p>{{$comment->comment}}</p>
                                        </div>
                                    </div>
                                @endforeach
                                <h3>Leave a Reply</h3>
                                <form class="form" method="post" action="{{ route('blogComment') }}" name="form">@csrf
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{$post->id}}">
                                        <input type="hidden" name="slug" value="{{$post->slug}}">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <textarea name="comment" placeholder="Comment"></textarea>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="name" placeholder="Name">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" name="email" placeholder="Email">
                                        </div>
                                        {{-- <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" name="txt" placeholder="Web site">
                                        </div> --}}
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="submit" name="submit" value="POST COMMENT" class="submit-btn">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="blog-left-section-responsive">
                        <div class="blog-left-search-responsive blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <input type="text" name="txt" placeholder="Search">
                            <input type="submit" name="submit" value="&#xf002;">
                        </div>
                        @if (isset($categories)&&count($categories)>0)
                        <div class="side-mobile-post blog-left-categories blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <h5>Categories</h5>
                            <ul class="list">
                                @foreach ($categories as $category)
                                    <a>{{$category->category}}</a>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (isset($other_posts)&&count($other_posts)>0)
                        <div class="side-mobile-recent blog-recent-post blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <h5>Recent Posts</h5>
                            @foreach ($other_posts as $other_post)
                            <a href="{{ route('detail_post', $other_post->id) }}">
                                <div class="recent-blog-list">
                                    <p><img src="{{$other_post->image ?? '/images/img18.png'}}" alt=""></p>
                                    <p><small>{{date('F d, Y',strtotime($other_post->created_at))}}</small></p>
                                    <h6>{{$other_post->tittle}}</h6>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        @endif
                        @if (isset($tags)&&count($tags)>0)
                        <div class="side-mobile-post popular-tag blog-common-wide wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <h5>Popular Tags</h5>
                            <ul class="list">
                            @foreach ($tags as $tag)
                                <a>{{$tag->tag}}</a>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Blog List -->

</div>
@endsection
@section('script')

@endsection