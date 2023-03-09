@extends('admin.master')
@section('module', 'User')
@section('action', 'Create')

@section('content')
<form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Create</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Please enter email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Please enter password">
            </div>

            <div class="form-group">
                <label>Password Confirmation</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Please enter password confirmation">
            </div>

            <div class="form-group">
                <label>Fullname</label>
                <input type="text" name="fullname" class="form-control" placeholder="Please enter fullname" value="{{ old('fullname') }}">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Please enter phone" value="{{ old('phone') }}">
            </div>

            <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="level">
                    <option value="2" {{ old('level') == 2 ? 'selected' : '' }}>Member</option>
                    <option value="1" {{ old('level') == 1 ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="form-group">
                <label>Avatar</label>
                <input type="file" class="form-control" name="avatar">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
@endsection