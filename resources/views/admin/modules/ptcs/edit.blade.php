@extends('admin.master')
@section('module', 'schedules')
@section('action', 'Edit')

@section('content')
<form action="{{ route('admin.schedules.update', ['id' => $schedules->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">schedules Edit</h3>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Mã Nhân Viên</label>
                <input type="text" name="MNV" class="form-control" placeholder="Please enter MNV" value="{{ old('MNV', $schedules->MNV) }}">
            </div>

            <div class="form-group">
                <label>Ngày bắt đầu off</label>
                <input type="text" name="StartOff_date" class="form-control" placeholder="Please enter StartOff_date" value="{{ old('StartOff_date', $schedules->StartOff_date) }}">
            </div>

            <div class="form-group">
                <label>Ngày kết thúc off</label>
                <input type="text" name="EndOff_date" class="form-control" placeholder="Please enter EndOff_date" value="{{ old('EndOff_date', $schedules->EndOff_date) }}">
            </div>

            <div class="form-group">
                <label>Note</label>
                <input type="text" name="Note" class="form-control" placeholder="Please enter Note" value="{{ old('Note', $schedules->Note) }}">
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
</form>
@endsection