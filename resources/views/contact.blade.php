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
        Contact
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
                    <img class="d-block w-100" src="{{url('img/contact.png')}}"/>
                    @include('layouts.banner-info')
                </div><!--/.item-->
            @endif
    
        </div>
    </div>
</section><!--/#main-slider-->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @include('alerts')
        </div>
    </div>
    <div class="row justify-content-center" style="margin-top: 35px;">
        @if(!empty($page->page_details))
            <div class="col-md-4">
                {!! $page->page_details !!}
            </div>

            <div class="col-md-8">
                @include('contact-form')
            </div>
        @else
            
            <div class="col-md-10 offset-md-2">
                @include('contact-form')
            </div>
        @endif

        <div class="col-md-12" style="margin-top: 45px; margin-bottom: 45px;">
            {!! $page->page_summary !!}
        </div>
        
    </div>
</div>

@include('layouts.footer')
@endsection
