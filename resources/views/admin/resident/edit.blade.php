@extends('admin.main')

@section('head')
@endsection

@section('content')
<!-- <div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div> -->
<form action="" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên cư dân" value="{{$resident->name}}">
                    @error ('name')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="{{$resident->phone}}">
                    @error ('phone')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>CMND/CCCD</label>
                    <input type="text" name="CMND" class="form-control" placeholder="Nhập CMND hoặc CCCD" value="{{$resident->CMND}}">
                    @error ('CMND')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Quê quán</label>
                    <input type="text" name="address" class="form-control" placeholder="Nhập quên quán" value="{{$resident->address}}">
                    @error ('address')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                <label>Ngày sinh</label>
                <input type="date" name="birthday" class="form-control" value="{{$resident->birthday}}">
                @error ('birtthday')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-sm-6">
                <div class="form-group">
                    <label>Căn hộ</label>
                    <select class="form-control" name="apartment_id">
                        <option value="">----------------------------------------Chọn căn hộ--------------------------------------------------------</option>
                        @foreach($apartments as $apartment)
                        <option value="{{ $apartment->id }}" {{ $resident->apartment_id == $apartment->id ? 'selected' : '' }}>
                            {{ $apartment->code }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                <label>Tình trạng</label>
                <input type="text" name="status" class="form-control" placeholder="Nhập tình trạng" value="{{$resident->status}}">
                @error ('status')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            
        </div>



        <div class="form-group col-sm-12">
            <label>Giới tính</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="gender" {{ $resident->gender == 1 ? 'checked="" ' : '' }}>
                <label for="active" class="custom-control-label">Nam</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="gender" {{ $resident->gender == 0 ? 'checked="" ' : '' }}>
                <label for="no_active" class="custom-control-label">Nữ</label>

            </div>
        </div>
    </div>



    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
    </div>
    @csrf
</form>
@endsection

@section('footer')
<!-- <script>
  CKEDITOR.replace('content');
</script> -->
@endsection