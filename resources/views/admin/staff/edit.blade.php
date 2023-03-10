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
                    <label for="user">Họ và tên</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên nhân viên" value="{{$staff->name}}">
                    @error ('name')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="{{$staff->phone}}">
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
                    <input type="text" name="CMND" class="form-control" placeholder="Nhập CMND hoặc CCCD" value="{{$staff->CMND}}">
                    @error ('CMND')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Chức vụ</label>
                    <select class="form-control" name="position_id">
                        @foreach($positions as $position)
                        <option value="{{ $position->id }}" {{ $staff->position_id == $position->id ? 'selected' : '' }}>
                            {{ $position->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label>Ngày sinh</label>
                <input type="date" name="birthday" class="form-control" value="{{$staff->birthday}}">
                @error ('birtthday')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label>Tỉnh</label>
                <select class="form-control city choose" name="city" id="city">
                    <option value="">----------------------------------------Chọn tỉnh thành phố--------------------------------------------------------</option>
                    @foreach($cities as $ci)
                    <option value="{{ $ci->matp }}" {{ $ci->matp == $staff->city ? 'selected' : '' }}>
                        {{ $ci->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Quận/Huyện</label>
                <select class="form-control district choose" name="district" id="district">
                    <option value="">----------------------------------------Chọn Quận/Huyện--------------------------------------------------------</option>
                    @foreach($districts as $district)
                    <option value="{{ $district->maqh }}" {{ $district->maqh == $staff->district ? 'selected' : '' }}>
                        {{ $district->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Xã/Phường</label>
                <select class="form-control ward" name="ward" id="ward">
                    @foreach($wards as $ward)
                    <option value="{{ $ward->xaid }}" {{ $ward->xaid == $staff->ward ? 'selected' : '' }}>
                        {{ $ward->name }}
                    </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label>Giới tính</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="gender" {{ $staff->gender == 1 ? 'checked="" ' : '' }}>
                <label for="active" class="custom-control-label">Nam</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="gender" {{ $staff->gender == 0 ? 'checked="" ' : '' }}>
                <label for="no_active" class="custom-control-label">Nữ</label>

            </div>
        </div>

    </div>



    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" name="update_staff" class="btn btn-primary update_staff">CẬP NHẬT</button>
    </div>
    @csrf
</form>
@endsection

@section('footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('.choose').on('change', function() {
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var $result = '';
            // alert(action);
            // alert(matp);
            // alert(_token);
            if (action == 'city') {
                result = 'district';
            } else {
                result = 'ward';
            }

            $.ajax({
                url: "{{url('admin/staff/select_address')}}",
                method: 'Post',
                data: {
                    action: action,
                    ma_id: ma_id,
                    _token: _token
                },
                success: function(data) {
                    $('#' + result).html(data);
                }
            });
        });
    });
</script>
@endsection