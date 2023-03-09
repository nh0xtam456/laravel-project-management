@extends('admin.master')
@section('module', 'Điều hành')
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
        <th><a href="{{  route('admin.users.create') }}" type="submit" class="fc-dayGridMonth-button btn btn-primary active">Thêm nhân viên</a></th>
      </tr>
        <tr>
            <th>ID</th>
            <th>Avatar</th>
            <th>Email</th>
            <th>Level</th>
            <th>Fullname</th>
            <th>Phone</th>
            <th>Created</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>

            @php
              $avatar = !empty($user->avatar) ? $user->avatar : 'default.jpg';
            @endphp

            <td><img src="{{ asset('images/'.$avatar) }}" width="50px"></td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->level == 1 ? 'Admin' : 'Member' }}</td>
            <td>{{ $user->fullname }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
            <td><a href="{{ route('admin.users.edit', ['id' => $user->id]) }}">Edit</a></td>
            <td><a href="{{ route('admin.users.destroy', ['id' => $user->id]) }}">Delete</a></td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection