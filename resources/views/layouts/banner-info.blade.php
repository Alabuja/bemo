<div class="carousel-caption d-none d-md-block">
    @if(!empty($page->page_header))
        <h1>{{$page->page_header}}</h1>
        <hr>
    @endif
</div>



@section('css')
<style>
    .carousel-caption h1{
        font-size: 45px;
        letter-spacing: 0.4rem;
    }
    hr{
        border: 1px solid #ffffff;
        width: 80%;
    }
</style>
@stop