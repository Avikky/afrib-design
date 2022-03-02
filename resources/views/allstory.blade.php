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
      <div class="col-md-3">
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title">All Category</h5>
                <small class="text-muted">Total number of story in a category on the right</small>
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
      </div>
        <div class="col-md-9">
            <div class="row">
                @foreach ($stories as $story)
                    <div class="col-md-6 card my-3" style="height: 220px; background-image: url('{{'storage/'.$story->image}}');background-position: center;background-repeat: no-repeat; background-size: cover;">

                        <div class="d-flex justify-content-center align-items-end card-body">
                            <div class="card-title px-4" style="width: 70%; height: 190px; background-color: rgb(0,0,0, 0.5); color: #fff; border-radius: 10px;" >
                                <h3 class="text-center">{{$story->title}}</h3>
                                <p>
                                    {!!html_entity_decode(substr(strip_tags($story->story) , 0, 50))!!}
                                </p>
                                <p class="d-flex justify-content-center">
                                    <a class="btn btn-primary btn-sm" href="{{route('view.story', ['slug' => $story->slug])}}">Read story</a>
                                </p>
                                <br>
                            </div>
                        </div>
        
                    </div>
                @endforeach
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
