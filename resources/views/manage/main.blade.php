@extends('layouts.app')

@section('content')
<div class="wrapper">
<?php 
$new_row;
foreach ($rows as $key => $value) {
$new_row = $value;
}

 ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 <!--    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"> -->
        <!--   <?php
          // $initname = Auth::user()->name;
          // $initname =preg_split('/\s+/', $initname);
          ?> -->
            <!-- <h1 class="m-0 text-dark"></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
 -->

    @if(Request::get('table'))
   
  <section class="content">
      <div class="container-fluid">

     <div class="row">
            <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{Route::currentRouteName()}}</h3>
              </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-stripped table-condensed">
               
               
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
                 
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    


     @endif


</div>
</div>

@endsection