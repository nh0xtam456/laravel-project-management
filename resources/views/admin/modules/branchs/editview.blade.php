@extends('admin.master')
@section('module', 'Chi nhánh')
@section('action', 'Danh sách')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">customers Edit</h3>
        </div>
    <form action="{{ route('admin.branchs.updateview', ['id' => $customers->id])}}" method="post">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label>Tên khách hàng</label>
                <input type="text" name="customername" class="form-control" placeholder="Please enter Product_name" value="{{ old('customername', $customers->customername) }}" disabled>
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="Address" class="form-control" placeholder="Please enter Intro" value="{{ old('Address', $customers->Address ) }}" disabled>
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="Phonenumber" class="form-control" placeholder="Please enter Intro" value="{{ old('Phonenumber', $customers->Phonenumber ) }}" disabled>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="Email" class="form-control" placeholder="Please enter Intro" value="{{ old('Email', $customers->Email ) }}" disabled>
            </div>

            <div class="form-group">
                <label>Note</label>
                <input type="text" name="Note" class="form-control" placeholder="Please enter Intro" value="{{ old('Note', $customers->Note ) }}" disabled>
            </div>

            <div class="form-group">
                <label>Chi nhánh</label>
                <input type="text" name="branchs_id" class="form-control" placeholder="Please enter Intro" value="{{ old('branchs_id', $customers->branchs_id ) }}" disabled>
            </div>

                <div class="form-group">
                    <label>Ngày thi công</label>
                    <input type="datetime-local" name="date_todo" class="form-control" placeholder="Please enter Intro" value="{{ old('date_todo', $customers->date_todo ) }}">
                </div>
                <label class="form-group">Nhân viên thi công</label>
                <br>
                <select name="staff_id">
                    @foreach($items as $staff)
                        <option value="{{$staff->id}}">{{$staff->Fullname}}</option>
                    @endforeach
                </select>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
    </div>

@endsection