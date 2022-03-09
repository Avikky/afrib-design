@extends('layouts.app')
@section('pageTitle', 'Category')
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
      <div class="col-md-4">
        <div class="card mt-3">
          <div class="card-header">
            <h3 class="card-title">All Category</h3><br>
            <small class="text-muted">Total number of story in a category on the right</small>
          </div>

          <div class="card-body">
            <ul class="list-group">
                @foreach ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{$category->name}}
                        <span class="badge badge-primary badge-pill">{{count(\App\Models\Story::where('category_id', $category->id)->get())}}</span>
                    </li>
                @endforeach
              </ul>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card mt-3">
          <div class="card-body">
            <div class="card">
                <img class="card-img-top" src="{{$story->image}}" alt="Card image cap">
                <div class="card-body">
                  <h3 class="card-title text-center">{{$story->title}}</h3>
                  <br>
                  <div class="card-footer row">
                    <small class="pr-2"><strong>Category:</strong> {{$story->cat_name}}</small>
                    <small class="pr-2"><strong>Date:</strong> <i>{{$story->created_at}}</i></small>
                    <small class="pr-2"><strong>Author</strong> </small>
                    <small class="pr-2">
                      <strong>status:</strong>
                      @if ($story->status == 0)
                      <span class="badge badge-warning">Pending till review</span>
                      @elseif($story->status == 1)
                      <span class="badge badge-primary">Published</span>
                      @elseif($story->status == 2)
                        <span class="badge badge-danger">Rejected</span>
                      @endif
                      
                    </small>
                    <small><strong>Location:</strong> <i class="">Russia</i></small>
                  </div>
                  <hr>
                  <p class="card-text">
                      {!! $story->story !!}
                  </p>
                  
                </div>
              </div>
          </div>
        </div><!-- /.box -->
      </div>
    </div>
  </div>
</div>
@endsection
