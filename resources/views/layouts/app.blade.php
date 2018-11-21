<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>
    @if(Auth::check()) @yield('title', Route::currentRouteName()) @else @yield('title',Route::currentRouteName()) @endif</title>

  
     <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">

  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.css">

</head>
<body class="hold-transition sidebar-mini">
    <div id="app">
    @if(Auth::check())
   
    @include('layouts/mainheader.header')
    <!-- this line includes sidebar  of the system -->
      @include('layouts.sideBar.sideBar')
      <!-- this line includes Content page of the system -->
            @yield('content')
        <!-- this line includes footer of the system -->
        @include('layouts/footer.footer')
       @else
        @yield('content')
       @endif
    </div>

<script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>


<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables/dataTables.bootstrap4.js"></script>


<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script>
  var columns = [];
  //var table = "";
   var href = '{{Request::get("table")}}'
  $(function () {
     if (href=="Supplier") {
       columns =[
       {'title':"Id",data:"id"},
       {'title':"Name",data:"name"},
       {'title':"Address",data:"address"},
       {'title':"Tell",data:"tell"},
       {'title':"User",data:"user_id"},
       {'title':"Date",data:"date"},
       {'title':"Action"},
      
      ]
    }else if(href=="User") {
     // table = "User";
      columns = 
      [
       {'title':"Id",data:"id"},
       {'title':"Name",data:"name"},
       {'title':"Email",data:"email"},
       {'title':"Date",data:"created_at"},
       {'title':"Action"},
      
      ]
    }else if(href=="Purchase"){
    //  table = "Purchase";
          columns = 
                [
                 {'title':"Id",data:"id"},
                 {'title':"Name",data:"name"},
                 {'title':"Quantity",data:"quantity"},
                 {'title':"Amount",data:"unitPrice"},
                  {'title':"Total",data:"total"},
                  {'title':"User Id",data:"userid"},
                  {'title':"Date",data:"date"},
                 {'title':"Action"},
                
                ]
    }else if (href == "Account"){
     // table ="Account";
        // $('#myModal').modal('show');
        columns = 
                [
                 {'title':"Id",data:"id"},
                 {'title':"#No",data:"account_no"},
                 {'title':"Account Name",data:"name"},
                 {'title':"User Id",data:"user_id"},
                  {'title':"Date",data:"date",width:300},
                   {'title':"Action",width:300},
                ]
    }else if (href == "AccountsInfo"){
     // table ="Account";
        // $('#myModal').modal('show');
        columns = 
                [
                 {'title':"Id",data:"id"},
                 {'title':"#No",data:"account_no"},
                 {'title':"Description",data:"describtion"},
                 {'title':"Dr",data:"Dr"},
                 {'title':"Cr",data:"Cr"},
                 {'title':"Balance",data:"Balance"},
                 {'title':"User Id",data:"user_id"},
                  {'title':"Date",data:"date",width:300},
                   {'title':"Action",width:300},
                ]
    }else if (href == "Category") {
      columns = 
      [
      {"title":"Id",data:"id"},
      {"title":"Name",data:"name"},
      {"title":"User Id",data:"user_id"},
      {"title":"Action",},
      ]
    }else if(href == "SubCategory"){
      columns = [
      {"title":"Id", data:"id"},
      {"title":"Name", data:"name"},
      {"title":"Cat Id", data:"cat_id"},
      {"title":"User Id", data:"user_id"},
      {"title":"Date", data:"date"},
      {"title":"Action",},

      ]
    }else if (href == "Product"){
      columns = [
        {"title":"Id",data:"id"},
        {"title":"Category",data:"cat_name"},
        {"title":"Sub Category",data:"subcat_name"},        
        {"title":"Quantity",data:"quantity"},
        {"title":"Price",data:"unit_price"},
        {"title":"Amount",data:"amount"},
        {"title":"Supplier",data:"sub_name"},
        {"title":"User",data:"name"},
        {"title":"Category",data:"cat_id",visible:false},
        {"title":"SubCategory",data:"subcat_id",visible:false},
        {"title":"supplier",data:"supplier_id",visible:false},
        {"title":"User",data:"user_id",visible:false},
        {"title":"Account",data:"account_no",visible:false},
        {"title":"Date",data:"date",visible:false},
        {"title":"Action"},
      ]
    }

    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker         : true,
      timePickerIncrement: 30,
      format             : 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    // $('#daterange-btn').daterangepicker(
    //   {
    //     ranges   : {
    //       'Today'       : [moment(), moment()],
    //       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    //       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
    //       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
    //       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
    //       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    //     },
    //     startDate: moment().subtract(29, 'days'),
    //     endDate  : moment()
    //   },
    //   function (start, end) {
    //     $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    //   }
    // )

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script>
  var table;
  $(function () {
   table = $('#example1').DataTable({
      "paging": true,
       //'serverSide':true,
      ajax:{
        'url':"loadusers",
        "data" : function ( d ) {
         d.table = href;
          d._token= _token;
        }
      },   
     
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,

      columns :columns,
      "columnDefs":[{
        "render": function(data,row,index){
          return '<a href="add?table='+href+'&id='+index.id+'" style="padding:15px"><i class="fa fa-edit"></i></a>'+'<a href="#" onClick="Delete(this)" id = "'+index.id+'"> <i class="fa fa-trash"></i></a>'
        },
        targets:columns.length-1
      }],
    });
  });
var _token = "{{ csrf_token() }}";
  Delete = function(da) {
    if(confirm('Are u Sure?')){
      //alert($(da).attr('id'));
      $.ajax({
        url:'delete',
        type:'post',
        data:{id:$(da).attr('id'),_token:_token},
        datatype:'json',
        success: function(data){
          alert(data.msg);
         // alert(data);
          table.ajax.reload();
        }
      })
    }
  }
</script>
<script type="text/javascript" src="js/tabledata.js"></script>
</body>
</html>
