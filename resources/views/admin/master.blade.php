<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.partials.head')
   @stack('css')
  </head>
  <body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      @include('admin.partials.navbar')
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      @include('admin.partials.main-sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.page-header')

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </div>
          @endif

          @if (Session::get('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            {{ Session::get('success') }}
          </div>
          @endif

          @yield('content')

          <!-- /.card -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      @include('admin.partials.footer')
      @stack('js')
  </body>
</html>
