
<?php 
use App\Http\Controllers\manageController;
$data = manageController::userupdate(Request::get('id'));
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
              <div class="card-header">
                <h3 class="card-title">{{Route::currentRouteName()}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form role="form" class="horizontal-form" method="POST" action="{{ route('create') }}">
                        @csrf
                     <div class="card-body">
                      @if(Request::get('id'))
                       <input type="hidden" name="id" value="{{$data->id}}">
                      <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Name</label>

                      <div class="col-md-8">
                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$data->name}}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                      </div> 
                    </div>
                   <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Email</label>

                      <div class="col-md-8">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$data->email }}" required>

                              @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                      </div>
                  </div>

                            <div class="form-group row">
                          <label for="name" class="col-md-2 col-form-label text-md-center">Password</label>
                      <div class="col-md-8">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                              @if ($errors->has('password'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                           </div>
                      </div>
                   <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-center">Confirm Password</label>
                                <div class="col-md-8">
                                 <input id="password" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                            </div> 
                         </div>


                  @else
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-center">Name</label>
                      <div class="col-md-8">
                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                      </div> 
                    </div>
                   <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Email</label>

                      <div class="col-md-8">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                      </div>
                  </div>

                    <div class="form-group row">
                          <label for="name" class="col-md-2 col-form-label text-md-center">Password</label>
                      <div class="col-md-8">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                              @if ($errors->has('password'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                           </div>
                      </div>
                   <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-center">Confirm Password</label>
                                <div class="col-md-8">
                                 <input id="password" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                            </div> 
                         </div>

                  @endif
              
        <div class="card-footer">
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
   </div>
<!--             <div class="card-body">
                 <div class="row">
              @if(Request::get('id'))
                <input type="hidden" name="id" value="{{$data->id}}">
                 <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                           <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $data->name }}" required autofocus>
                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>


                      <div class="col-md-6">
                        
            <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $data->email }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                  </div>
              
                      </div>
                      @else
                   <div class="col-md-6">
                     <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                       <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                      </div>


                     <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                      @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                   </div>
                  </div>


               <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  </div>
                </div>

              @endif
                </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div> -->
              </form>
           </div>
           </div>
         </div>
       </div>
     </section>


