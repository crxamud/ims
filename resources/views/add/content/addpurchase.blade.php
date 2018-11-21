
<?php 
$suppliers = App\Model\Supplier::all();

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

        <form role="form" class="horizontal-form" method="POST" action="{{ route('New Purchase') }}">
                        @csrf

                 <div class="card-body" >
          <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Select Category</label>
                      <div class="col-md-8">
                        <select class="form-control select2">

                          <option value="Select Category">Select Category</option>
                          <option value="saab">Saab</option>
                          <option value="mercedes">Mercedes</option>
                          <option value="audi">Audi</option>

                        </select>
                          <!-- <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="productname" value="" required autofocus>

                          @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif -->
                      </div>
                  </div>

                    <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Product Name</label>

                      <div class="col-md-8">
                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="productname" value="" required autofocus>

                          @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Quantity</label>

                      <div class="col-md-8">
                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="quantity" value="" required autofocus>

                          @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Unit Price</label>

                      <div class="col-md-8">
                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="unitprice" value="" required autofocus>

                          @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                 </div>  <!-- card body ends here -->
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
    
    

