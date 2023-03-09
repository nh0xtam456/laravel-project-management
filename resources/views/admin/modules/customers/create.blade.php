@extends('admin.master')
@section('module', 'Customer')
@section('action', 'Create')

@section('content')
<form action="{{ route('admin.customers.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Customer Create</h3>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Tên khách hàng</label>
                <input type="text" name="Fullname" class="form-control" placeholder="Please enter name" value="{{ old('Fullname') }}">
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="Address" class="form-control" placeholder="Please enter Address" value="{{ old('Address') }}">
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="Phone" class="form-control" placeholder="Please enter Phone" value="{{ old('Phone') }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="Email" class="form-control" placeholder="Please enter Email" value="{{ old('Email') }}">
            </div>

            <div class="form-group">
                <label>Quận</label>
                <select class="form-control" name="District">
                    @foreach ($branch as $da)
                    <option value="{{ $da->id }}" {{ old('branch_id') == $da->id ? 'selected' : '' }}>{{ $da->Name }}</option>
                    @endforeach
                </select>
            </div>

            

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
@endsection