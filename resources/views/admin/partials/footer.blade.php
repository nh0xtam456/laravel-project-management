<footer class="main-footer">
    <div class="float-right d-none d-sm-block"><b>Version</b> {{ app()->version() }}</div>
    <strong
      >Copyright &copy; {{ date('Y') }}
      <a href="">TamDT5 FPT Telecom featuring Green Academy</a>.</strong
    >
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->

<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->

<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/fullcalendar/main.js') }}"></script>

<script src="{{ asset('admin/js/demo.js') }}"></script>


@stack('endjs1')

@stack('endjs')
@stack('endjs2')

<script>
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $("select[name='branch_id']").change(function(){
      var branch_id = 1;
      branch_id = $(this).val();
      
      $.ajax({
        url: '{{route('admin.customers.fetchStaff')}}',
        method:"POST",
        data: {'branch_id' : branch_id},
        success: function (data){
          $("select[name='staff_id']").html(data)
        },
      })
    })
  })
</script>
