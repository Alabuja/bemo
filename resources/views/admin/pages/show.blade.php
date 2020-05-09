@extends('admin.layouts.app')

@section('admin-title')
    Pages
@stop

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pages</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @include('alerts')
            </h6>
        </div>
        @if(count($pages) > 0)
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Index Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $key => $page)
                                <tr>
                                    <td>{{$page->page_name}}</td>
                                    <td>{{$page->page_url}}</td>
                                    <td>
                                        @if($page->isIndexed == true)
                                            Indexed
                                        @else
                                            Not Indexed
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/pages/'. $page->id) }}" class="btn btn-info">
                                            Edit Page
                                        </a>

                                        @if($page->isIndexed == true)
                                            <form action="{{url('admin/pages/index/'.$page->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="indexStatus" value="0">
                                                <button class="btn btn-primary" type="submit">Un-Indexed Page</button>
                                            </form>
                                        @else
                                            <form action="{{url('admin/pages/index/'.$page->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="indexStatus" value="1">
                                                <button class="btn btn-success" type="submit">Index Page</button>
                                            </form>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <h1>No Pages Yet</h1>
        @endif
    </div>

  </div>
  <!-- /.container-fluid -->

  @endsection