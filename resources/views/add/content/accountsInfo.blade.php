
<!-- <?php 
// namespace App\Model;
// use Illuminate\Database\Eloquent\Model;
// use DB;
 ?> -->
 <?php 
  $accounts = \App\Model\Account::all();

  ?>
 @if(Session::has('message'))
                      <p class="alert alert-danger">{{ Session::get('message') }}</p>
                      @endif
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

        <form role="form" class="horizontal-form" method="POST" action="{{ route('Accounts Info') }}">
                        @csrf

                      

          <div class="card-body" >
          <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Select Account</label>
                      <div class="col-md-8">
                        <select class="form-control select2 form-control{{ $errors->has('accounts') ? ' is-invalid' : '' }}" name="accounts">
                          <option value="">Select Category</option>
                          @foreach($accounts as $val)                 
                         <option value="{{$val->account_no}}">{{$val->name}}</option>
                         @endforeach
                        </select>
                         @if ($errors->has('accounts'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('accounts') }}</strong>
                              </span>
                          @endif
                          <!-- <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="productname" value="" required autofocus>

                          @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif -->
                      </div>
                  </div>



                    <div class="form-group row">
                       <label for="name" class="col-md-2 col-form-label text-md-center">Select Type</label>
                      <div class="col-md-8">
                        <select class="form-control select2 form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type">
                          <option value="">Select Type</option>
                          <option value="dr">Depit</option>
                          <option value="cr">Credit</option>
                        </select>
                       @if ($errors->has('type'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('type') }}</strong>
                              </span>
                          @endif
                  </div>

                </div>

                  <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Amount</label>
                      <div class="col-md-8">
                          <input id="name" type="number" step="any" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value=""  autofocus>

                          @if ($errors->has('cr'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('amount') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="name" class="col-md-2 col-form-label text-md-center">Description</label>

                      <div class="col-md-8">
                          <input id="name" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="" autofocus>

                          @if ($errors->has('description'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('description') }}</strong>
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
    
    

