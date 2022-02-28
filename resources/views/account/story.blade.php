@extends('layouts.master')
@section('pageTitle', 'All Posts')
@section('content')
<div class="content">
  <div class="container">
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
    @endif

    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Error!</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="row">
      <div class="col-lg-12">
        <div class="card mt-3">
          <div class="card-header">
            <h3 class="card-title">All post</h3>
          </div>
       
          <div class="card-body">
            <div class="table-responsive p-2">
              <table class="table table-hover" id="example1">
                <thead>
                  <tr>
                    <th width="550px">Title</th>
                    <th>Date Published</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($posts as $post)
                    <tr>
                      <td>{{ $post->title }}</td>
                      <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->toFormattedDateString() }}<br>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</td>
                      <td> 
                        <a href="{{ url('admin/blog') }}/{{ $post->id }}">
                          <i class="fa fa-edit btn btn-info btn-sm"></i>
                        </a>
 
                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete{{ $post->id }}').submit();">
                          <i class="fa fa-trash btn btn-danger btn-sm"></i>
                        </a>
                      </td>
                     
                      <form id="delete{{ $post->id }}" action="{{ url('/admin/blog') }}/{{$post->id}}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ Method_field('DELETE') }}
                      </form>
                      
                    </tr>
                  @empty
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </div>
</div>
@endsection
