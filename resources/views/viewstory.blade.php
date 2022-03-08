@extends('layouts.live')
@section('title', 'View Story')
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
              <h5 class="card-title">All Category</h5>
              <small class="text-muted">See stories under a category</small>
          </div>

          <div class="card-body">
            <div class="list-group">
                <a href="{{route('all.story')}}" class="list-group-item list-group-item-action active">
                    All Categories
                </a>
                @foreach ($categories as $category)
                    <a href="{{route('all.story', ['category'=>$category->id])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{$category->name}}
                        <span class="badge badge-primary badge-pill">{{count(\App\Models\Story::where('category_id', $category->id)->get())}}</span>
                    </a>
                @endforeach
            </div>
          </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title">All Locations</h5>
                <small class="text-muted">See stories about a location</small>
            </div>

            <div class="card-body">
                <div class="list-group">
                    <a href="{{route('all.story')}}" class="list-group-item list-group-item-action active">
                        All Locations
                    </a>
                    @foreach ($locations as $location)
                        <a href="{{route('all.story', ['location'=>$location->id])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            {{$location->country}}
                            <span class="badge badge-primary badge-pill">{{count(\App\Models\Story::where('category_id', $location->id)->get())}}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card mt-3">
          <div class="card-header">
              <h5 class="card-title">Twitter space</h5>
              <small class="text-muted">See stories about places on twitter</small>
          </div>
          <div class="card-body">
            <a href="https://twitter.com/intent/tweet?button_hashtag=places&ref_src=twsrc%5Etfw" class="twitter-hashtag-button" data-show-count="false">Tweet #places</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-header">
              <h5 class="card-title">Map Area</h5>
              <small class="text-muted">Google map will be here</small>
          </div>
          <div class="card-body">
            
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card mt-3">
          <div class="card-body">
            <div class="card">
                <img class="card-img-top" src="{{'/storage/'.$story->image}}" alt="Card image cap">
                <div class="card-body">
                  <h3 class="card-title text-center">{{$story->title}}</h3>
                  <br>
                  <div class="card-footer row">
                    <small class="pr-2"><strong>Category:</strong> {{$story->cat_name}}</small>
                    <small class="pr-2"><strong>Date:</strong> <i>{{$story->created_at}}</i></small>
                    <small class="pr-2"><strong>Author</strong> {{\App\Models\User::find($story->user_id)->name }}</small>
                    <small class="pr-2">
                      <strong>status:</strong>
                      @if ($story->status == 0)
                      <span class="badge bg-warning">Pending till review</span>
                      @elseif($story->status == 1)
                      <span class="badge bg-primary">Published</span>
                      @elseif($story->status == 2)
                        <span class="badge bg-danger">Rejected</span>
                      @endif
                      
                    </small>
                    <small><strong>Location:</strong> <i class="">{{$story->loca_country}}</i></small>
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
