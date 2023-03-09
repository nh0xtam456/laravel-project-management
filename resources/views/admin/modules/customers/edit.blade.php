@extends('admin.master')
@section('module', 'customer')
@section('action', 'Edit')

@section('content')
<form action="{{ route('admin.customers.update', ['id' => $customer->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">customer Edit</h3>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Tên khách hàng</label>
                <input type="text" name="Fullname" class="form-control" placeholder="Please enter Fullname" value="{{ old('Fullname', $customer->Fullname) }}">
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="Address" class="form-control" placeholder="Please enter Address" value="{{ old('Address', $customer->Address) }}">
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="Phonenumber" class="form-control" placeholder="Please enter Phonenumber" value="{{ old('Phonenumber', $customer->Phonenumber) }}">
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="Email" class="form-control" placeholder="Please enter Email" value="{{ old('Email', $customer->Email) }}">
            </div>

            <div class="form-group">
                <label>Note</label>
                <textarea type="text" name="Note" class="form-control" placeholder="Please enter Note">"{{ old('Note', $customer->Note) }}"</textarea>
            </div>
            
            <div class="form-group">
                <label>Ngày thi công</label>
                <input type="datetime-local" name="date_todo" class="form-control" placeholder="Please enter Intro" value="{{ old('date_todo', $customer->date_todo ) }}">
            </div>

            <div class="form-group">
                <label>Kết quả tư vấn</label>
                <select name="Status">
                    <option value="0">Liên hệ KH notok</option>
                    <option value="1">KH đang suy nghĩ</option>
                    <option value="2">KH đang thiếu tiền</option>
                    <option value="3">KH đã chốt đơn</option>
                </select>
            </div>

            <label class="form-group">Chi nhánh</label>
                <br>
                <select name="branch_id">
                    @foreach($branchs as $branch)
                        <option value="{{$branch->id}}">{{$branch->Name}}</option>
                    @endforeach
                </select>
            <br>
            <label class="form-group">Nhân viên thi công</label>
                <br>
                <select name="staff_id">
                    @foreach($staffs as $staff)
                        <option value="{{$staff->id}}">{{$staff->Fullname}}</option>
                    @endforeach
                </select>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
</form>
@endsection

