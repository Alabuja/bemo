@extends('layouts.app')

@section('description')
<meta name="description" content="{{$page->page_meta_description}}">
@endsection
@section('indexpage')
    @if($page->isIndexed == true)
        <meta name="robots" content="noindex,nofollow">
    @endif
@stop

@section('title')
    @if(empty($page->page_meta_title))
        Home
    @else
       {{ $page->page_meta_title }}
    @endif
@stop

@section('content')
<section id="main-slider" class="no-margin">
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @if(!empty($page->page_image_url))
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{url($page->page_image_url)}}"/>
                    @include('layouts.banner-info')
                </div><!--/.item-->
            @else
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{url('img/banner-home.jpg')}}"/>
                    @include('layouts.banner-info')
                </div><!--/.item-->
            @endif
    
        </div>
    </div>
</section><!--/#main-slider-->

<div class="container">
    <div class="row justify-content-center" style="margin-top: 35px;">
        @if(!empty($page->page_details))
            {!! $page->page_details !!}
        @else
            <h1>No Content Now</h1>
        @endif
    </div>
</div>

@include('layouts.footer')
@endsection
