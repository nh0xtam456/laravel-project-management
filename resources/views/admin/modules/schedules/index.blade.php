@extends('admin.master')
@section('module', 'Lịch làm việc')
@section('action', 'Danh sách')

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
          <a href="{{  route('admin.schedules.calendar') }}" type="submit" class="fc-dayGridMonth-button btn btn-primary active">Calendar</a>
        </td>
        <td>
          <a href="{{  route('admin.schedules.create') }}" type="submit" class="fc-dayGridMonth-button btn btn-primary active">Tạo lịch</a>
        </td>
      </tr>
        <tr>
            <th>ID</th>
            <th>Mã nhân viên</th>
            <th>Ngày off</th>
            <th>Ghi chú</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($schedules as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->MNV}}</td>
            <td>{{ $item->Dayoff}}</td>
            <td>{{ $item->Note}}</td>
            {{-- <td><a href="">Edit</a></td>
            <td><a href="">Delete</a></td> --}}
            <td><a href="{{ route('admin.schedules.edit', ['id' => $item->id]) }}">Edit</a></td>
            <td><a href="{{ route('admin.schedules.destroy', ['id' => $item->id]) }}">Delete</a></td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection