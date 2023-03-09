@extends('admin.master')
@section('module', 'Customer')
@section('action', 'Create')

@section('content')
<form action="{{ route('admin.schedules.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Customer Create</h3>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Mã nhân viên</label>
                <select name="MNV">
                    @foreach($data as $staff)
                        <option value="{{$staff->id}}">{{$staff->id}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Ngày OFF</label>
                <input type="date" name="Dayoff" class="form-control" placeholder="Please enter Dayoff" value="{{ old('Dayoff') }}">
            </div>

            <div class="form-group">
                <label>Note</label>
                <input type="text" name="Note" class="form-control" placeholder="Please enter Note" value="{{ old('Note') }}">
            </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
@endsection