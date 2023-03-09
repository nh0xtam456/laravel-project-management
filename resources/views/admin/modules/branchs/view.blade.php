@extends('admin.master')
@section('module', 'Branchs')
@section('action', 'View')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Customer have task in {{ $branch->Name }}</h3>
    </div>

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Note</th>
                <th>Ngày thi công</th>
                <th>Phân công nhân viên</th>
                <th>Edit</th>
        </thead>
        <tbody>
            @foreach ($customers as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->Fullname}}</td>
                <td>{{ $item->Address}}</td>
                <td>{{ $item->Phonenumber}}</td>
                <td>{{ $item->Email}}</td>
                <td>{{ $item->Note}}</td>
                <td>{{ $item->date_todo}}</td>
                <td>{{ $item->Staffname}}</td>
                {{-- <td><a href="">Edit</a></td>
                <td><a href="">Delete</a></td> --}}
                <td><a href="{{ route('admin.branchs.editview', ['id' => $item->id]) }}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection