@extends('layouts.app')
@section('pageTitle', 'Profile')
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
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="card mt-3">
          <div class="card-body">
            <div class="card">
                @if(Auth::user()->image != null)
                    <div class="d-flex justify-content-center">
                        <img width="160px" height="160px" class="img-circle" src="{{asset(Auth::user()->image)}}" alt="Card image cap">
                    </div>
                @else
                    <div class="d-flex justify-content-center">
                        <img class="img-circle" width="170px" height="170px" src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg" alt="User Avatar">
                    </div>
                @endif
                <h3 class="text-center">{{Auth::user()->name}}</h3>
                <br><br>

                <div class="card-body">
                    <form action="{{route('update.profile', ['id' => Auth::id()])}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>                     
                            <input class="form-control" value="{{Auth::user()->name}}" type="text" name="name">
                        </div> 
                        <div class="form-group">
                            <label for="name">email</label>                     
                            <input class="form-control" value="{{Auth::user()->email}}" type="text" name="email">
                        </div>
                        @if(Auth::user()->role != 1)
                            <div class="form-group">
                                <label for="name">Special login link</label>                     
                                <input readonly class="form-control" value="{{Auth::user()->link}}" type="text">
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="profile_pic">Change profile picture</label>
                            <input class="form-control-file" type="file" name="profile_pic" >  
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
              </div>
          </div>
        </div><!-- /.box -->
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</div>
@endsection
