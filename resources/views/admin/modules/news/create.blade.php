@extends('admin.master')
@section('module', 'product')
@section('action', 'Create')

@section('content')
<form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">News Create</h3>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Tiêu đề bài viết</label>
                <input type="text" name="title" class="form-control" placeholder="Please enter title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label>Tóm tắt</label>
                <input type="text" name="intro" class="form-control" placeholder="Please enter intro" value="{{ old('intro') }}">
            </div>

            <div class="form-group">
                <label>Nội dung</label>
                <textarea class="form-control" name="content" cols="30" rows="10" value="{{ old('content') }}"></textarea>
                <script>
                    CKEDITOR.replace('content', {
                        filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
                        filebrowserUploadMethod: 'form'
                    })
                </script>
            </div>

            <div class="form-group">
                <label>Avatar</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <input type="text" name="intro" class="form-control" placeholder="Please enter intro" value="{{ old('intro') }}">
            </div>

            <div class="form-group">
                <label>Vị trí bài đăng</label>
                <select class="form-control" name="position">
                    <option value="1" {{ old('position') == 2 ? 'selected' : '' }}>Vị trí đầu tiên</option>
                    <option value="2" {{ old('position') == 1 ? 'selected' : '' }}>Vị trí 2</option>
                    <option value="3" {{ old('position') == 1 ? 'selected' : '' }}>Vị trí cuối cùng</option>
                </select>
            </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
@endsection