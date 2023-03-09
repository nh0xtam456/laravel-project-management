@extends('admin.master')
@section('module', 'Branchs')
@section('action', 'Edit')

@section('content')
<form action="{{ route('admin.branchs.update', ['id' => $branchs->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Branchs Edit</h3>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Tên chi nhánh</label>
                <input type="text" name="Name" class="form-control" placeholder="Please enter Product_name" value="{{ old('Intro', $branchs->Name) }}">
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="Address" class="form-control" placeholder="Please enter Intro" value="{{ old('Address', $branchs->Address ) }}">
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="Phone" class="form-control" placeholder="Please enter Content" value="{{ old('Phone', $branchs->Phone) }}">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
</form>
@endsection