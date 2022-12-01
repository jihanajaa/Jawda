@extends('layouts._layouts')
@section('title')
{!!$menu->menu!!}
@endsection
@section('description')
{!!$menu->page!!}
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
                <li class="active"><a>{{$menu->menu}}</a></li>
            </ul>
        <label class="now">{{$menu->menu}}</label>
        </div>
    </div>
</section>

<section class="default-section">
    <div class="container">
        <div class="col-md-9 col-sm-8 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="terms-left">
                {!!$menu->page!!}
            </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
            @if ($menu_customers->isNotEmpty())
            <div class="terms-right">
                <h5 class="text-center" style="margin-top: 10px;">Customer Care</h5>
                <ul>
                    @foreach ($menu_customers as $menu_customer)
                        @if ( $menu_customer->slug == $slug )
                            <li style="margin-bottom: 5px;" class="active"><a href="{{route('menu', $menu_customer->slug)}}">{{$menu_customer->menu}}</a></li>
                        @else
                            <li style="margin-bottom: 5px;"><a href="{{route('menu', $menu_customer->slug)}}">{{$menu_customer->menu}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($menu_helps->isNotEmpty())  
            <div class="terms-right" style="margin-top: 10px;">
                <h5 class="text-center" style="margin-top: 10px;">Bantuan</h5>
                <ul>
                    @foreach ($menu_helps as $menu_help)
                        @if ( $menu_help->slug == $slug )
                            <li style="margin-bottom: 5px;" class="active"><a href="{{route('menu', $menu_help->slug)}}">{{$menu_help->menu}}</a></li>
                        @else
                            <li style="margin-bottom: 5px;"><a href="{{route('menu', $menu_help->slug)}}">{{$menu_help->menu}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
@section('script')

@endsection