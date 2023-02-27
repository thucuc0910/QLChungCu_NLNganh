@extends('admin.main')

@section('head')
@endsection

@section('content')
<div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div>
<form action="" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="admin">Họ và tên</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên nhân viên" value="{{ $admin->name }}">
                    @error ('name')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Nhập email" value="{{ $admin->email }}">
                    @error ('email')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label>Nhân viên</label>
                <select class="form-control" name="staff_id">
                    <option value="">----------------------------------------Chọn nhân viên--------------------------------------------------------</option>
                    @foreach($staffs as $staff)
                    <option value="{{ $staff->id }}" {{ $admin->staff_id == $staff->id ? 'selected' : '' }}>
                        {{ $staff->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-6 hidden">
            <div class="form-group">
                <input type="text" name="password" class="form-control" value="{{ $admin->password }}">
                @error ('password')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
        </div>
        @csrf


    </div>












</form>
@endsection

@section('footer')
<!-- <script>
    CKEDITOR.replace('content');
</script> -->
@endsection