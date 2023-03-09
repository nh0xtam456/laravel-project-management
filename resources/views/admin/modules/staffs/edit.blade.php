@extends('admin.master')
@section('module', 'staffs')
@section('action', 'Edit')

@section('content')
<form action="{{ route('admin.staffs.update', ['id' => $staffs->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">staffs Edit</h3>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Tên nhân viên</label>
                <input type="text" name="Fullname" class="form-control" placeholder="Please enter Fullname" value="{{ old('Fullname', $staffs->Fullname) }}">
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="Phone" class="form-control" placeholder="Please enter Phone" value="{{ old('Phone', $staffs->Phone) }}">
            </div>

            <div class="form-group">
                <label>Chi nhánh</label>
                <select name="Branch_id" id="">
                    @foreach($branch as $item)
                        <option value="{{$item->id}}">{{$item->Name}}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
</form>
@endsection