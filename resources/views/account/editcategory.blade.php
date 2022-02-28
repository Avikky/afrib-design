@extends('layouts.userpage')
@section('pageTitle', 'Edit Category')
@section('content')

<div class="content-wrapper">   <!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <!-- general form elements disabled -->
      <div class="box box-solid">
        <div class="box-header">
          <h3 class="box-title">Edit Category ({{ $category->title }})</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form" action="{{ url('/editcategory') }}/{{ $category->id }}" method="POST" >
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <!-- text input -->
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" value="{{ $category->title }}" name="title" Required/>
              
            </div>

            <div class="form-group">
              <label>Price in Naira</label>
              <input type="text" class="form-control" value="{{ $category->price }}" name="price" Required/>
               
            </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Brief Description</label>
              <textarea class="form-control" rows="3" name="description">{{ $category->description }}</textarea>
               
            </div>

            <div class="form-group">
                <input type="submit" value="Edit" class="btn btn-success">
            </div>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col (right) -->
  </div>   <!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection
