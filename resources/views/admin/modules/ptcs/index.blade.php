@extends('admin.master')
@section('module', 'Lịch làm việc')
@section('action', 'List')

@push('css')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
@endpush

@section('content')
<table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <td>
          <a href="{{  route('admin.ptcs.calendar') }}" type="submit" class="fc-dayGridMonth-button btn btn-primary active">Calendar</a>
        </td>
      </tr>
        <tr>
            <th>ID</th>
            <th>Số hợp đồng</th>
            <th>Tên khách hàng</th>
            <th>Ngày hẹn</th>
            <th>Nhân viên thi công</th>
            <th>Ghi chú</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($customers as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->id}}</td>
            <td>{{ $item->Fullname}}</td>
            <td>{{ $item->date_todo}}</td>
            <td>{{ $item->staff_name}}</td>
            <td>{{ $item->Note}}</td>
            {{-- <td><a href="">Edit</a></td>
            <td><a href="">Delete</a></td> --}}
            <td><a href="{{ route('admin.branchs.editview', ['id' => $item->id]) }}">Edit</a></td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection