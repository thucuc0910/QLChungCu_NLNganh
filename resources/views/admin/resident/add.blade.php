@extends('admin.main')

@section('head')
@endsection

@section('content')
<form action="" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên cư dân">
                    @error ('name')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Căn hộ</label>
                    <select class="form-control" name="department_code">
                        <option value="">----------------------------------------Chọn căn hộ--------------------------------------------------------</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->code }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>CMND/CCCD</label>
                    <input type="text" name="CMND" class="form-control" placeholder="Nhập CMND hoặc CCCD">
                    @error ('CMND')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                    @error ('phone')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Quê quán</label>
                    <input type="text" name="address" class="form-control" placeholder="Nhập quên quán">
                    @error ('address')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-sm-6">
                <label>Ngày sinh</label>
                <input type="date" name="birthday" class="form-control" >
                @error ('birtthday')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label>Tình trạng</label>
                <input type="text" name="status" class="form-control" placeholder="Nhập tình trạng">
                @error ('status')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group col-sm-6">
                <label>Giới tính</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="gender" checked="">
                    <label for="active" class="custom-control-label">Nam</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="gender">
                    <label for="no_active" class="custom-control-label">Nữ</label>
                </div>
            </div>
        </div>
    </div>



    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">THÊM</button>
    </div>
    @csrf
</form>
@endsection

@section('footer')
<!-- <script>
  CKEDITOR.replace('content');
</script> -->
@endsection