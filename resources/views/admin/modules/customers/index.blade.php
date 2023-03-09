@extends('admin.master')
@section('module', 'Khách hàng')
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
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Ghi chú</th>
            <th>Kết quả gọi điện</th>
            <th>Ngày thi công</th>
            <th>Chi nhánh thực hiện</th>
            <th>Nhân viên thực hiện</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($customers as $khachhang)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $khachhang->Fullname}}</td>
            <td>{{ $khachhang->Address}}</td>
            <td>{{ $khachhang->Phonenumber}}</td>
            <td>{{ $khachhang->Email}}</td>
            <td>{{ $khachhang->Note}}</td>
            <td>@php
                if($khachhang->Status=='0')
                {
                  echo'Liên hệ KH notok';
                }
                if($khachhang->Status=='1')
                {
                  echo'KH đang suy nghĩ';
                }
                if($khachhang->Status=='2')
                {
                  echo'KH đang thiếu tiền';
                }
                if($khachhang->Status=='3') {
                  echo'KH đã chốt đơn';
                }
            @endphp</td>
            <td>{{ $khachhang->date_todo}}</td>
            <td>{{ $khachhang->branchs_name}}</td>
            <td>{{ $khachhang->Staffname}}</td>
            {{-- <td><a href="">Edit</a></td>
            <td><a href="">Delete</a></td> --}}
            <td><a href="{{ route('admin.customers.edit', ['id' => $khachhang->id]) }}">Edit</a></td>
            <td><a href="{{ route('admin.customers.destroy', ['id' => $khachhang->id]) }}">Delete</a></td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection