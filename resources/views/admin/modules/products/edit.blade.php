@extends('admin.master')
@section('module', 'Products')
@section('action', 'Edit')

@section('content')
<form action="{{ route('admin.products.update', ['id' => $products->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Products Edit</h3>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="Product_name" class="form-control" placeholder="Please enter Product_name" value="{{ old('Product_name', $products->Product_name) }}">
            </div>

            <div class="form-group">
                <label>Tóm tắt</label>
                <input type="text" name="Intro" class="form-control" placeholder="Please enter Intro" value="{{ old('Intro', $products->Intro) }}">
            </div>

            <div class="form-group">
                <label>Nội dung</label>
                <input type="text" name="Content" class="form-control" placeholder="Please enter Content" value="{{ old('Content', $products->Content) }}">
            </div>

            <div class="form-group">
                <label>Giá</label>
                <input type="text" name="Price" class="form-control" placeholder="Please enter Price" value="{{ old('Price', $products->Price) }}">
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
</form>
@endsection