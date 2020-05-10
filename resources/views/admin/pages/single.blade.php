@extends('admin.layouts.app')

@section('admin-title')
    {{ucwords($page->page_name)}}
@stop

    @section('admin-css')
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    @stop

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ucwords($page->page_name)}}</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @include('alerts')
            </h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('admin/pages/'. $page->id)}}">
                @csrf

                <div class="form-group row col-md-12">
                    <div class="col-md-6 required">
                        <label for="page_name" class="col-form-label text-md-right">{{ __('Page Name') }}</label>
                        <input id="page_name" type="text" class="form-control{{ $errors->has('page_name') ? ' is-invalid' : '' }}" name="page_name" value="{{ $page->page_name }}" required autofocus>

                        @if ($errors->has('page_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="alert alert-danger">{{ $errors->first('page_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="page_meta_title" class="col-form-label text-md-right">{{ __('Meta Title') }}</label>
                        <input id="page_meta_title" type="text" class="form-control" name="page_meta_title" value="{{ $page->page_meta_title  }}" >
                    </div>
                </div>

                <div class="form-group row col-md-12">
	                <div class="col-md-6">
                        <label for="page_meta_description" class="col-form-label text-md-right">{{ __('Meta Description') }}</label>

                        <textarea id="page_meta_description" name="page_meta_description" class="form-control" rows="6" placeholder="Page Description"> {{ $page->page_meta_description }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="page_header" class="col-form-label text-md-right">{{ __('Page Header Text') }}</label>
                        <input id="page_header" type="text" class="form-control" name="page_header" value="{{ $page->page_header  }}"  >
                    </div>
                </div>

                <div class="form-group row col-md-12">
                    <div class="col-md-6">
                        <label for="page_summary_summernote" class="col-form-label text-md-right">{{ __('Page Summary') }}</label>

                        <textarea id="page_summary_summernote" name="page_summary" class="form-control"> {!! $page->page_summary !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="page_details_summernote" class="col-form-label text-md-right">{{ __('Page Details') }}</label>

                        <textarea id="page_details_summernote" name="page_details" class="form-control"> {!! $page->page_details !!}</textarea>
                    </div>
                </div>
                
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" id="btnUpdatePage">
                            {{ __('Update Page') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{url('admin/pages/'. $page->id. '/banner')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row col-md-12 required">
                    <label for="page_image_url" class="col-form-label text-md-right">{{ __('Page Page Banner') }}</label>
				    <input id="page_image_url" type="file" class="form-control" name="page_image_url" required>
                </div>

                @if(!empty($page->page_image_url))
                    <div class="form-group row col-md-12">
                        <div class="col-md-6 col-sm-10">
                            <img  src="{{url($page->page_image_url)}}"  width="150px" height="150px"/>
                        </div>
                    </div>
                @endif

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" id="btnUpdatePage">
                            {{ __('Update Page Banner') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->

  @section('admin-js')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>   
 
    <script>
        $(document).ready(function() {
            $('#page_details_summernote').summernote({ 
                placeholder: 'Enter Page Details ...',
                height: 150
            });

            $('#page_summary_summernote').summernote({ 
                placeholder: 'Enter Page Note',
                height: 150
            });
        });
    </script>
    @stop
  @endsection