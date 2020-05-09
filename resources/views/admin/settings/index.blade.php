@extends('admin.layouts.app')

@section('admin-title')
    Settings
@stop

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Settings</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @include('alerts')
            </h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('admin/settings/')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row col-md-12">
                    <div class="col-md-4 required">
                        <label for="email_address" class="col-form-label text-md-right">{{ __('Email To Send Contact Form To') }}</label>
                        <input id="email_address" type="email" class="form-control" name="email_address" value="{{ $setting->email_address }}" autofocus>
                    </div>

                    <div class="col-md-4">
                        <label for="facebook_url" class="col-form-label text-md-right">{{ __('Facebook URL') }}</label>
                        <input id="facebook_url" type="text" class="form-control" name="facebook_url" value="{{ $setting->facebook_url  }}"  >
                    </div>

                    <div class="col-md-4">
                        <label for="google_analytics" class="col-form-label text-md-right">{{ __('Google Analytics Tag') }}</label>
                        <textarea id="google_analytics" name="google_analytics" class="form-control" rows="6"> {{ $setting->google_analytics }}</textarea>
                    </div>
                </div>

                <div class="form-group row col-md-12">
	                <div class="col-md-4">
                        <label for="facebook_advertising_pixel" class="col-md-4 col-form-label text-md-right">{{ __('Facebook Advertising Pixel') }}</label>

                        <textarea id="facebook_advertising_pixel" name="facebook_advertising_pixel" class="form-control" rows="6"> {{ $setting->facebook_advertising_pixel }}</textarea>
                    </div>

                    <div class="col-md-4">
                        <label for="twitter_url" class="col-form-label text-md-right">{{ __('Twitter URL') }}</label>
                        <input id="twitter_url" type="text" class="form-control" name="twitter_url" value="{{ $setting->twitter_url }}"  >
                    </div>

                    <div class="col-md-4">
                        <label for="logo_image_url" class="col-form-label text-md-right">{{ __('Logo') }}</label>
				        <input id="logo_image_url" type="file" class="form-control" name="logo_image_url">
				    </div>

                </div>

                @if(!empty($setting->logo_image_url))
                    <div class="form-group row col-md-12">
                        <div class="col-md-6 col-sm-10">
                            <img  src="{{url($setting->logo_image_url)}}"  width="150px" height="150px"/>
                        </div>
                    </div>
                @endif

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary" id="btnUpdateSetting">
                            {{ __('Update Setting') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->

  @endsection