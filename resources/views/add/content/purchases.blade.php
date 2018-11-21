@extends('layouts.app')
@section('content')
 <?php 
  $accounts = \App\Model\Account::all();
  $supplier = \App\Model\Supplier::all();
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
            <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title" style="display: inline-block;">{{Route::currentRouteName()}}</h3>
                 <!-- <a class="btn  btn-sm pull-right" style="display: inline-block;" onclick="saveTbRows('#table1')">
                         <i class="fa fa-plus"></i>
                        </a> -->
              </div>
          
            <div class="card-body">
              <table id="table1" class="table  table-stripped table-condensed">
			    <thead class="table-bordered">
			    	<td>Category</td>
			    	<td>Sub Category</td>
			    	<td>Quantity</td>
            <td>Unit Price</td>
			    	<td>Total</td>
			    	<td>Action</td>
			    	
			    </thead> 
			    <tbody id="tbodycontroller" class="table-bordered">
			    </tbody>


			    <tfoot style="border: none;">
            <td><a onclick="$('#table1').tableEditor('table')" class="btn circle btn-info" style="color: white"><i class="fa fa-plus"></i></a> </td>
            <td>
              <select name="selectaccount" class="select2 form-control{{ $errors->has('selectaccount') ? ' is-invalid' : '' }}">
                <option disabled selected> Select Account</option>
                @foreach($accounts as $account)
                <option value="{{$account->account_no}}">
                  {{$account->name}}
                </option>
                @endforeach
              </select>
              @if ($errors->has('selectaccount'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('selectaccount') }}</strong>
                              </span>
                @endif
            </td>
            <td colspan="2">
              <select name="supplier" class="select2 form-control{{ $errors->has('supplier') ? ' is-invalid' : '' }}">
                <option disabled selected> Select Supplier</option>
                @foreach($supplier as $supplier)
                <option value="{{$supplier->id}}">
                  {{$supplier->name}}
                </option>
                @endforeach
              </select>
              @if ($errors->has('supplier'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('supplier') }}</strong>
                              </span>
                @endif</td>
            
			    	<td id="grandtotal">
              Total : $0
            </td>
			    	<td class="pull-right">
          <a class="btn btn-primary pull-right" onclick="saveTbRows('#table1')"> 
            <i style="color: white; font-size: 18px; font-weight: bold;">Submit</i></a>    
            </td>
			    </tfoot>
         </table>
         <!-- <button class="btn btn-primary pull-right" type="submit"> Submit </button> -->
         

      </div>
<!--  <div class="card-body">
        <table id = "table" class="table table-bordered table-stripped table-condensed">
    <tr>
        <td>Select Account </td>
        <td> 
          <select name="accounts" form-control>
          <option selected disabled> --Select Account --</option> 
          <option value="1">1 </option> 
          <option value="2">2 </option> 
         </select>
        </td>
      </tr>
  </table>
 </div> -->
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

</div>
@endsection