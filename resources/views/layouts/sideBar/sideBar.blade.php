  <?php 
  use App\Http\Controllers\CAuth;


   ?>
   @if(Auth::check()) @yield('title', Route::currentRouteName()) @else @yield('title',Route::currentRouteName()) @endif</title>
    
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Abdirahman Hamud</span>
    </a>

    <!-- Side Bar goes here -->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <?php
          $initname = Auth::user()->name;
          $initname =preg_split('/\s+/', $initname);
          ?>
          <a href="#" class="d-block">{{''.$initname[0]}}</a>
        
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
          
           @foreach(CAuth::perms() as $val)
              @if($val->parent_id == 0)
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon {{$val->icon}}"></i>
                  <p>
                   {{$val->name}}
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @foreach(CAuth::perms() as $vals)
                    @if($val->id == $vals->parent_id)
                  <li class="nav-item">
                    <a href="{{$vals->url}}" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>{{$vals->name}}</p>
                    </a>
                  </li>
                  @endif
                  @endforeach
                </ul>
            @endif
            @endforeach
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
     <!-- Side Bar ends here -->
  <!-- Content Wrapper. Contains page content -->