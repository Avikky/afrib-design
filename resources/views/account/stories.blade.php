@extends('layouts.app')
@section('pageTitle', 'All Stories')
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
          <div class="card-header row">
            <h3 class="card-title col-md-10">All My Stories</h3>
            <button data-target="#modal-lg" data-toggle="modal" class="col-md-2 btn btn-sm btn-primary">Add new Story</button>
          </div>

          <div class="modal fade" id="modal-lg" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Share your story to the world</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" class="profile-wrapper" enctype="multipart/form-data" action="{{ route('create.story') }}" >
                        @csrf
                         
                            <div class="form-group">
                               <label for="fname">Story Title</label>                     
                               <input class="form-control" type="text" name="title" required autofocus placeholder="Super Hikcing Experience">
                           </div> 
                          <div class="form-group">
                            <label for="fname">Story Category</label> 
                            <select class="form-control" name="category" id="">
                              @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="fname">Select Location</label> 
                            <select class="form-control" name="location" id="">
                              @foreach ($locations as $location)
                                <option value="{{$location->id}}">{{$location->country}}</option>
                              @endforeach
                            </select>
                          </div>
                         <div class="form-group">
                           <label for="fname">Main Story</label>
                           <textarea  class="form-control" id="storyEditor" rows="50" cols="40" name="story">
                           </textarea>
                           <script>
                               // Replace the <textarea id="editor1"> with a CKEditor
                               // instance, using default configuration.
                               CKEDITOR.replace( 'storyEditor' );
                           </script>   
                         </div>
       
                          <div class="form-group">
                             <label for="fname">Featured Image</label>
                             <input class="form-control" type="file" name="featured_image" required autofocus>  
                         </div>                            
                 
                    </div>
                    <div class="modal-footer justify-content-between">
                      <input hidden type="text" name="is_draft" value="1">
                      <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                      <button type="submit" class="btn btn-primary">Publish</button>
                  </div>

                </form>
            </div>
            
            </div>
            
          </div>

       
          <div class="card-body">
            <div class="row">
              @forelse($stories as $story)
                <div class="col-md-4">
                  <div class="card card-widget widget-user shadow-lg">
                    <div class="widget-user-header text-white" style="background: url('{{'/storage/'.$story->image}}') center center;">
                    
                    </div>
                    <div class="widget-user-image">
                      @if (Auth::user()->image == null)
                        <img class="img-circle" src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg" alt="User Avatar">
                      @else
                        <img class="img-circle" src="{{'/storage/'.Auth::user()->image}}" alt="User Avatar">
                      @endif
                      
                    </div>
                    
                    <div class="card-footer">
                      <div class="row">
                        <div class="justify-content-center">
                          <h4 class="widget-user-desc text-center">{{$story->title}}</h4> 
                        </div>
                        <div class="row">
                          <p class="row px-3">
                            {{ substr(strip_tags($story->story) , 0, 100) }} 
                          </p>
                          <div class="row px-3">
                            <small class="pr-4"><strong>Category:</strong> {{$story->cat_name}}</small>
                            <small><strong>Date:</strong> <i>{{$story->created_at}}</i></small>

                            <small class="pr-4">
                              <strong>status:</strong>
                              @if ($story->status == 0)
                              <span class="badge badge-warning">Pending till review</span>
                              @elseif($story->status == 1)
                              <span class="badge badge-primary">Published</span>
                              @elseif($story->status == 2)
                                <span class="badge badge-danger">Rejected</span>
                              @endif
                              
                            </small>
                            <small><strong>Location:</strong> <i class="">{{$story->loca_country}}</i></small>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row gx-3">
                        <a href="{{route('show.story', ['slug' => $story->slug])}}" class="btn btn-xs btn-primary mx-2 px-2">Preview</a>
                        @if (Auth::user()->role == 1)
                          <a href="" data-target="#editor{{$story->id}}" data-toggle="modal" class="btn btn-xs btn-warning mx-2 px-2">Take Action</a>
                        @else
                          <a href="" data-target="#editor{{$story->id}}" data-toggle="modal" class="btn btn-xs btn-default mx-2 px-2">Edit</a>
                        @endif
                        <a href="" class="btn btn-xs btn-danger mx-2 px-2">Delete</a>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="editor{{$story->id}}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Share your story to the world</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          @if (Auth::user()->role == 1)
                            <div class="row">
                              <div class="col-md-6">
                                <div class="d-flex justify-content-center">
                                  <form method="Post" class="profile-wrapper" action="{{ route('approve.story', ['id' => $story->id] ) }}" >
                                    {{ csrf_field() }}
                                      
                                    <div class="modal-footer justify-content-between">
                                      <input hidden type="text" name="approve" value="1">
                                      <button type="submit" class="btn btn-success">Approve story</button>
                                    </div>
            
                                  </form>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="d-flex justify-content-center">
                                  <form method="post" class="profile-wrapper" enctype="multipart/form-data" action="{{ route('reject.story', ['id'=> $story->id] ) }}" >
                                    {{ csrf_field() }}
                                      
                                    <div class="modal-footer justify-content-between">
                                      <input hidden type="text" name="reject" value="2">
                                      <button type="submit" class="btn btn-danger">Reject story</button>
                                    </div>
            
                                  </form>
                                </div>
                              </div>
                            </div>
                          @else
                            <form method="post" class="profile-wrapper" enctype="multipart/form-data" action="{{ route('edit.story', ['id'=> $story->id] ) }}" >
                              {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="fname">Story Title</label>                     
                                    <input class="form-control" value="{{$story->title}}" type="text" name="title" required autofocus placeholder="Super Hikcing Experience">
                                </div> 
                                <div class="form-group">
                                  <label for="fname">Story Category</label> 
                                  <select class="form-control" name="category" id="">
                                    <option selected value="{{$story->category_id}}">{{$story->cat_name}}</option>
                                    <optgroup label="Other countries">
                                      @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                      @endforeach
                                    </optgroup>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="fname">Select Location</label> 
                                  <select class="form-control" name="location" id="">
                                    <option selected value="{{$story->location_id}}">{{$story->loca_country}}</option>
                                    <optgroup label="Other countries">
                                      @foreach ($locations as $location)
                                        <option value="{{$location->country}}">{{$location->country}}</option>
                                      @endforeach
                                    </optgroup>
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label for="fname">Main Story</label>
                                    <textarea  class="form-control" id="storyEditor{{$story->id}}" rows="50" cols="40" name="story">
                                      {{ $story->story}}
                                    </textarea>
                                    <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        CKEDITOR.replace( 'storyEditor{{$story->id}}');
                                    </script>   
                                </div>
                                <div class="form-group">
                                  @if($story->image != null)
                                    <label for="image_preview">Image preview</label><br>
                                    <img style="width:100%; height: 400%;" src="{{'/storage/'.$story->image}}" alt="">
                                  @else
                                    <p>No image available </p>
                                  @endif
                                </div>
                                <div class="form-group">
                                  <label for="featured_image">Featured Image</label>
                                  <input class="form-control" type="file" name="featured_image" >  
                                </div> 
                                <div class="modal-footer justify-content-between">
                                  <input hidden type="text" name="is_draft" value="1">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                                  <button type="submit" class="btn btn-primary">Send for review</button>
                                </div>
                            </form>
                          @endif
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
                  <p class="text-center">You have no stories yet, create one today!</p>
              @endforelse
            </div>
          </div>

        </div>    
      </div>
    </div>
  </div>
</div>
@endsection
