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
                    <label for="user">Họ và tên</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên nhân viên" value="{{ $user->name }}">
                    @error ('name')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>


            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="{{ $user->phone }}">
                    @error ('phone')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Nhập email" value="{{ $user->email }}">
            @error ('email')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>


        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Cư dân</label>
                    <select class="form-control" name="resident_id">
                        <option value="0">Không có căn hộ</option>

                        @foreach($residents as $resident)
                        <option value="{{ $resident->id }}" {{ $user->resident_id == $resident->id ? 'selected' : '' }}>
                            {{ $resident->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-6">

                <div class="form-group">
                    <label>Loại</label>
                    <select class="form-control" name="type">
                        <option value="adm" {{ $user->type == 'adm' ? 'selected="" ' : '' }}>Quản lý</option>
                        <option value="stf" {{ $user->type == 'stf' ? 'selected="" ' : '' }}>Nhân viên</option>
                        <option value="usr" {{ $user->type == 'usr' ? 'selected="" ' : '' }}>Người dùng</option>
                    </select>
                    @error ('type')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group hidden">
                <input type="text" name="password" value="{{ $user->password }}">
            </div>
            <!-- /.card-body -->


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