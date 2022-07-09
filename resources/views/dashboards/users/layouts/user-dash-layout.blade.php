<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
  <title>@yield('title')</title>
  <base href="{{ \URL::to('/') }}">



  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../../../plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.min.css">
  {{-- crop image --}}
  <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}">
  <link rel='stylesheet' href='../../../sweetAlertGlenz/sweetalert2.min.css'>
  @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('user.dashboard')}}" class="nav-link">Home</a>
      </li>
{{-- log out --}}
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('logout') }}" class="nav-link"
        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
        {{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"">
          @csrf
      </form>
      </li>
{{-- end log out --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('user.dashboard')}}" class="brand-link">
      <img src="https://occ-0-55-1567.1.nflxso.net/dnm/api/v6/LmEnxtiAuzezXBjYXPuDgfZ4zZQ/AAAABbB3NTw6bUtZ0kySFp9qsEZAmKTd61m5psZcqQXFcGAa733aIKy-Ep2LsPV0LOu4Uej5H6G9ttPUoKrRu2FBGht01SoKgUfAg8w0vdJIsPRp.png?r=680" 
      alt="AdminLTE Logo" class="brand-image img-rectangle " style="opacity: .8">
      <span class="brand-text font-weight-light">Project 1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->picture }}" class="img-circle elevation-2 admin_picture" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('user.dashboard')}}" class="d-block admin_name">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('user.dashboard')}}" class="nav-link {{ (request()->is('user/dashboard*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                My Activity
                <span class="right badge badge-danger">{{$count_todo}}</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('user.profile')}}" class="nav-link {{ (request()->is('user/profile*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Profile
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @yield('content')
    
    </section>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>GBRDG</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="../../../plugins/jquery/jquery.min.js"></script><!-- jQuery -->
<script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script><!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../../../sweetAlertGlenz/sweetalert2.all.min.js"></script>
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script><!-- Bootstrap 4 -->
<script src="../../../plugins/chart.js/Chart.min.js"></script><!-- ChartJS -->
<script src="../../../plugins/sparklines/sparkline.js"></script><!-- Sparkline -->
<script src="../../../plugins/jqvmap/jquery.vmap.min.js"></script><!-- JQVMap -->
<script src="../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="../../../plugins/jquery-knob/jquery.knob.min.js"></script><!-- jQuery Knob Chart -->
<script src="../../../plugins/moment/moment.min.js"></script><!-- daterangepicker -->
<script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script><!-- Tempusdominus Bootstrap 4 -->
<script src="../../../plugins/summernote/summernote-bs4.min.js"></script><!-- Summernote -->
<script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script><!-- overlayScrollbars -->
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../dist/js/pages/dashboard.js"></script>
{{-- crop picture --}}
<script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>

{{-- CUSTOM JS CODES --}}
<script>

  $.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });
  
  $(function(){

    /* UPDATE ADMIN PERSONAL INFO */

    $('#UserInfoForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('.admin_name').each(function(){
                     $(this).html( $('#UserInfoForm').find( $('input[name="firstname"]') ).val() );
                      
                  });
                  
                  Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Profile Info Updated Successfully',
                  showConfirmButton: false,
                  timer: 2000
                      })
                }
           }
        });
    });



    $(document).on('click','#change_picture_btn', function(){
      $('#admin_image').click();
    });


    $('#admin_image').ijaboCropTool({
          preview : '.admin_picture',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("userPictureUpdate") }}',
          // withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Profile Picture Updated Successfully',
            showConfirmButton: false,
            timer: 2000
                      })
          },
          onError:function(message, element, status){
            Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Profile Picture Update Failed',
            showConfirmButton: false,
            timer: 2000
                      })
          }
       });


    $('#changePasswordAdminForm').on('submit', function(e){
         e.preventDefault();

         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#changePasswordAdminForm')[0].reset();
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Password Successfully Updated',
                showConfirmButton: false,
                timer: 2000
                      })
              }
            }
         });
    });

    
  });

</script>




<script>
  window.addEventListener('OpenAddActivityModal', function(){
       $('.addActivity').find('span').html('');
       $('.addActivity').find('form')[0].reset();
       $('.addActivity').modal('show');
  });

  window.addEventListener('CloseAddActivityModal', function(){
      $('.addActivity').find('span').html('');
      $('.addActivity').find('form')[0].reset();
      $('.addActivity').modal('hide');     
      Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'New Activity Added',
                  showConfirmButton: false,
                  timer: 2000
                      })
  });

  window.addEventListener('OpenEditActivityModal', function(event){
      $('.editActivity').find('span').html('');
      $('.editActivity').modal('show');
  });

  window.addEventListener('CloseEditActivityModal', function(event){
      $('.editActivity').find('span').html('');
      $('.editActivity').find('form')[0].reset();
      $('.editActivity').modal('hide');
      Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Activity Updated',
                  showConfirmButton: false,
                  timer: 2000
                      })
  });
/////////////// Conected ////////////////////////////////
  window.addEventListener('SwalConfirm', function(event){
      swal.fire({
          title:event.detail.title,
          imageWidth:48,
          imageHeight:48,
          html:event.detail.html,
          showCloseButton:true,
          showCancelButton:true,
          cancelButtonText:'Cancel',
          confirmButtonText:'Yes, Delete',
          cancelButtonColor:'#d33',
          confirmButtonColor:'#3085d6',
          width:300,
          allowOutsideClick:false
      }).then(function(result){
          if(result.value){
              window.livewire.emit('delete',event.detail.id);
          }
      })
  })

  window.addEventListener('deleted', function(event){
    Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Activity Deleted',
                  showConfirmButton: false,
                  timer: 2000
                      })
  });


  window.addEventListener('swal:deleteConfirm', function(event){

      swal.fire({
          title:event.detail.title,
          html:event.detail.html,
          showCloseButton:true,
          showCancelButton:true,
          cancelButtonText:'No',
          confirmButtonText:'Yes',
          cancelButtonColor:'#d33',
          confirmButtonColor:'#3085d6',
          width:300,
          allowOutsideClick:false
      }).then(function(result){
          if(result.value){
              // window.livewire.emit('deleteCheckedCountries',event.detail.checkedIDs);
          }
      });
  });
  </script>
@livewireScripts
</body>
</html>
