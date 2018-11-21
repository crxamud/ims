@extends('layouts.app')

@section('content')
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


    @if(Request::get('user'))
        @include('add.content.adduser')
    @elseif(Request::get('purchase'))
      @include('add.content.purchases')
    @elseif (Request::get('supplier'))
     @include('add.content.addsupplier')
    @elseif(Request::get('Category'))
      @include('add.content.addcategory')
    @elseif(Request::get('Account'))
      @include('add.content.addAccount')
    @elseif(Request::get('AccountsInfo'))
      @include('add.content.accountsinfo')
    @elseif(Request::get('SubCategory'))
      @include('add.content.subCategory')
  @endif



    @if(Request::get('table')=="User")
        @include('add.content.adduser')
    @elseif(Request::get('table')=="Purchase")
      @include('add.content.addpurchase')
    @elseif (Request::get('table')=="Supplier")
     @include('add.content.addsupplier')
    @elseif(Request::get('table')=="Category")
      @include('add.content.addcategory')
    @elseif(Request::get('table')=="Account")
      @include('add.content.addAccount')
    @elseif(Request::get('table')=="AccountsInfo")
      @include('add.content.accountsinfo')
     @elseif(Request::get('table')=="SubCategory")
      @include('add.content.subCategory')
  @endif

</div>
</div>


@endsection