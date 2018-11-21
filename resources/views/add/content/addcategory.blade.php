<?php 
use \App\Http\Controllers\manageController;
$data = manageController::categoryUpdate(Request::get('id'));

 ?>
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
<!--                   <div class="col-sm-6">
                      <h3 class="card-title pull-right" >
                         <button type="button" class="btn btn-default btn-sm">
                          <span class="glyphicon glyphicon-plus">+</span>
                        </button>
                        </h3>
                  </div> -->
                </div>
              </div>
              <!-- Class header ends here -->

        <form role="form" class="horizontal-form" method="POST" action="{{ route('New Category') }}">
                        @csrf

                 <div class="card-body" >
                  @if(Request::get('id'))
                  <input type="hidden" name="id" value="{{$data->id}}"/>
                  <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Category Name</label>

                      <div class="col-md-8">
                            <input id="name" type="text"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$data->name}}"  autofocus required>

                          @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif


                      </div>
                  </div>
                  @else
                  <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Category Name</label>

                      <div class="col-md-8">
                            <input id="name" type="text"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{old('name')}}"  autofocus required>

                          @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif


                      </div>
                  </div>
                  @endif
                    
                 
                 </div>  <!-- card body ends here -->
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
        </form>
       </div>   <!-- card primary ends here -->

    </section>