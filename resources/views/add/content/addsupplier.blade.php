
<?php 
use App\Http\Controllers\manageController;
$data = manageController::supplierUpdate(Request::get('id'));
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

 <form role="form" class="horizontal-form" method="POST" action="{{ route('New Supplier') }}">
                        @csrf
       <div class="card-body" >
          @if(Request::get('id'))
          <input type="hidden" name="id" value="{{$data->id}}">
            <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label text-md-center">Supplier Name</label>

                  <div class="col-md-8">
                      <input id="name" type="text" class="form-control{{ $errors->has('suppliername') ? ' is-invalid' : '' }}" name="suppliername" value="{{$data->name}}"  autofocus>

                      @if ($errors->has('suppliername'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('suppliername') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label text-md-center">Address/Location</label>

                  <div class="col-md-8">
                      <input id="name" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{$data->address}}"  autofocus>

                      @if ($errors->has('address'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('address') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label text-md-center">Tel</label>

                  <div class="col-md-8">
                      <input id="name" type="text" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{$data->tell}}"  autofocus>

                      @if ($errors->has('tel'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('tel') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              @else
        <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label text-md-center">Supplier Name</label>

                  <div class="col-md-8">
                      <input id="name" type="text" class="form-control{{ $errors->has('suppliername') ? ' is-invalid' : '' }}" name="suppliername" value="{{old('suppliername')}}"  autofocus>

                      @if ($errors->has('suppliername'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('suppliername') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label text-md-center">Address/Location</label>

                  <div class="col-md-8">
                      <input id="name" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{old('address')}}"  autofocus>

                      @if ($errors->has('address'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('address') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="form-group row">
                  <label for="name" class="col-md-2 col-form-label text-md-center">Tel</label>

                  <div class="col-md-8">
                      <input id="name" type="text" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{old('tel')}}"  autofocus>

                      @if ($errors->has('tel'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('tel') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              @endif
       </div>
        <div class="card-footer">
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
      </form>
              

            </div>
          </div>
        </div>
      </div>
    </section>
    

