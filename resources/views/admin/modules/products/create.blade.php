@extends('admin.master')
@section('module', 'product')
@section('action', 'Create')

@section('content')
<form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">product Create</h3>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="Product_name" class="form-control" placeholder="Please enter Product_name" value="{{ old('Product_name') }}">
            </div>

            <div class="form-group">
                <label>Tóm tắt</label>
                <input type="text" name="Intro" class="form-control" placeholder="Please enter Intro" value="{{ old('Intro') }}">
            </div>

            <div class="form-group">
                <label>Nội dung</label>
                <input type="text" name="Content" class="form-control" placeholder="Please enter Content" value="{{ old('Content') }}">
            </div>

            <div class="form-group">
                <label>Giá</label>
                <input type="text" name="Price" class="form-control" placeholder="Please enter Price" value="{{ old('Price') }}">
            </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
@endsection