@extends('admin.main')

@section('head')
@endsection

@section('content')
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
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Nhập email" value="{{$staff->email}}">
                    @error ('email')
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
                    <select class="form-control" name="position">
                        <option value="adm" {{ $staff->gender == 0 ? 'selected="" ' : '' }}>Quản lý</option>
                        <option value="stf" {{ $staff->gender == 0 ? 'selected="" ' : '' }}>Nhân viên</option>
                    </select>
                    @error ('type')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">


        </div>
        <div class="form-group col-sm-12">
            <label>Ngày sinh</label>
            <input type="date" name="birthday" class="form-control" value="{{$staff->birthday}}">
            @error ('birtthday')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Tỉnh</label>
                <select class="form-control city choose" name="city" id="city">
                    <option value="">----------------------------------------Chọn tỉnh thành phố--------------------------------------------------------</option>
                    @foreach($cities as $ci)
                    <option value="{{ $ci->matp }}" {{ $ci->matp == $staff->city ? 'selected' : '' }}>
                                {{ $ci->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Quận/Huyện</label>
                <select class="form-control provine choose" name="provine" id="provine">
                    <option value="">----------------------------------------Chọn Quận/Huyện--------------------------------------------------------</option>
                    @foreach($provines as $provine)
                    <option value="{{ $provine->maqh }}" {{ $provine->maqh == $staff->provine ? 'selected' : '' }}>
                                {{ $provine->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Xã/Phường</label>
                <select class="form-control ward" name="ward" id="ward">
                    <option value="">----------------------------------------Chọn Xã/Phường--------------------------------------------------------</option>
                    
                    @foreach($wards as $ward)
                    <option value="{{ $ward->xaid }}" {{ $ward->xaid == $staff->ward ? 'selected' : '' }}>
                                {{ $ward->name }}</option>
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
    $(document).ready(function(){
            $('.choose').on('change',function() {
                var action =$(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var $result = '';
                // alert(action);
                // alert(matp);
                // alert(_token);
                if(action == 'city'){
                    result = 'provine';
                }else{
                    result = 'ward';
                }

                $.ajax({
                    url : "{{url('admin/staff/select_address')}}",
                    method: 'Post',
                    data: {action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                        $('#'+result).html(data);
                    }
                });
            });
        });
</script>
@endsection