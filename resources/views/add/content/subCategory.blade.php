@extends('layouts.app')
@section('content')

<?php 
use \App\Http\Controllers\manageController;
$data = manageController::subcatUpdate(Request::get('id'));
$cat = \App\Model\Category::all();
 ?>
 <div class="wrapper">


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
        <!--   <?php
          // $initname = Auth::user()->name;
          // $initname =preg_split('/\s+/', $initname);
          ?> -->
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-10">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="error_msg">
      
 </div>
  <section class="content">
      <div class="container-fluid">
     <div class="row">
        <div class="col-md-1">

        </div>

          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- Class header goes here -->
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                      <h3 class="card-title" >{{Route::currentRouteName()}}</h3>
                </div>

                  <div class="col-sm-6">
                      <h3 class="card-title pull-right" >
                         <a class="btn  btn-sm" onclick="$('#myModal').modal('show')">
                         <i class="fa fa-plus"></i>
                        </a>
                        </h3>
                  </div>
                </div>
              </div>
              <!-- Class header ends here -->

        <form role="form" class="horizontal-form" method="POST" action="{{ route('Sub Category') }}">
                        @csrf
          <div class="card-body">
            @if(Request::get('id'))
         <input type="hidden" name="id" value="{{$data->id}}"/>
          <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Select Category</label>
                      <div class="col-md-8">
                        <select class="form-control select2 form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category">
                          <option value="">Select Category</option>
                          @foreach($cat as $val)  
                                            
                        




                            @if($val->id==$data->cat_id)               
                         <option value="{{$val->id}}" selected>{{$val->name}}</option>
                         @else
                          <option value="{{$val->id}}">{{$val->name}}</option>
                         @endif
                          
                         @endforeach
                        </select>
                         @if ($errors->has('category'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('category') }}</strong>
                              </span>
                          @endif
                      </div>
           </div>
          <div class="form-group row">
              <label for="name" class="col-md-2 col-form-label text-md-center">Sub Category Name</label>
              <div class="col-md-8">
                  <input id="name" type="text"  class="form-control{{ $errors->has('subname') ? ' is-invalid' : '' }}" name="subname" value="{{$data->name}}"  autofocus>

                  @if ($errors->has('subname'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('subname') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
         </div>
         @else
          <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Select Category</label>
                      <div class="col-md-8">
                        <select class="form-control select2 form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category">
                          <option value="">Select Category</option>
                          @foreach($cat as $val)                 
                         <option value="{{$val->id}}">{{$val->name}}</option>
                         @endforeach
                        </select>
                         @if ($errors->has('category'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('category') }}</strong>
                              </span>
                          @endif
                      </div>
           </div>
          <div class="form-group row">
              <label for="name" class="col-md-2 col-form-label text-md-center">Sub Category Name</label>
              <div class="col-md-8">
                  <input id="name" type="text"  class="form-control{{ $errors->has('subname') ? ' is-invalid' : '' }}" name="subname" value="{{old('subname')}}"  autofocus>

                  @if ($errors->has('subname'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('subname') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
         </div>
         @endif
            <div class="card-footer">
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        </form>
       </div> 
       </div>
       </div>
       </div>
       </section>  <!-- card primary ends here -->
      @include('add.content.model')
  </div>
</div>
@endsection