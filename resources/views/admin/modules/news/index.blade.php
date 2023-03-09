@extends('admin.master')
@section('module', 'Quản lý tin tức')
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
        <th><a href="{{  route('admin.news.create') }}" type="submit" class="fc-dayGridMonth-button btn btn-primary active">Thêm bài viết</a></th>
      </tr>
        <tr>
            <th>ID</th>
            <th>Hình tiêu đề</th>
            <th>Tiêu đề</th>
            <th>Tóm tắt</th>
            <th>Vị trí bài đăng</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($news as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            @php 
              $image= !empty($item->image) ? $item->image : 'default.jpg';
            @endphp
            <td><img src="{{ asset('images/'.$image) }}" width="50px"></td>
            <td>{{ $item->title}}</td>
            <td>{{ $item->intro}}</td>
            <td>@php
              if($item->position=='1')
              {
                echo'Vị trí đầu tiên';
              }
              if($item->position=='2')
              {
                echo'Vị trí thứ 2';
              }
              if($item->position=='3')
              {
                echo'Vị trí thứ 3';
              }
          @endphp
            </td>
            {{-- <td><a href="">Edit</a></td>
            <td><a href="">Delete</a></td> --}}
            <td><a href="{{ route('admin.news.edit', ['id' => $item->id]) }}">Edit</a></td>
            <td><a href="{{ route('admin.news.destroy', ['id' => $item->id]) }}">Delete</a></td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection