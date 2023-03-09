@extends('admin.master')
@section('module', 'User')
@section('action', 'Edit')

@section('content')
<form action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Create</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Please enter email" value="{{ old('email', $user->email) }}">
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
                <input type="text" name="fullname" class="form-control" placeholder="Please enter fullname" value="{{ old('fullname', $user->fullname) }}">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Please enter phone" value="{{ old('phone', $user->phone) }}">
            </div>

            <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="level">
                    <option value="2" {{ old('level', $user->level) == 2 ? 'selected' : '' }}>Member</option>
                    <option value="1" {{ old('level', $user->level) == 1 ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="form-group">
                <label>Avatar Current</label>

                @php
                    $avatar = !empty($user->avatar) ? $user->avatar : 'default.jpeg';
                @endphp

                <div>
                    <img src="{{ asset('images/'. $avatar) }}" alt="" width="100px">
                </div>
            </div>

            <div class="form-group">
                <label>Avatar</label>
                <input type="file" class="form-control" name="avatar">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
</form>
@endsection