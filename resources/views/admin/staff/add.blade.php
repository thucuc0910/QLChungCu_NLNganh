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
                    <input type="text" name="name" class="form-control name" placeholder="Nhập tên nhân viên">
                    @error ('name')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control email" placeholder="Nhập email">
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
                    <input type="text" name="CMND" class="form-control CMND" placeholder="Nhập CMND hoặc CCCD">
                    @error ('CMND')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Chức vụ</label>
                    <select class="form-control position" name="position">
                        <option value="adm">Quản lý</option>
                        <option value="stf">Nhân viên</option>
                    </select>
                    @error ('type')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">


        </div>
        <div class="form-group col-sm-6">
            <label>Ngày sinh</label>
            <input type="date" name="birthday" class="form-control birthday">
            @error ('birtthday')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Tỉnh</label>
                <select class="form-control city choose" name="city" id="city">
                    <option value="">----------------------------------------Chọn tỉnh thành phố--------------------------------------------------------</option>
                    @foreach($city as $ci)
                    <option value="{{ $ci->matp }}">{{ $ci->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Quận/Huyện</label>
                <select class="form-control district choose" name="district" id="district">
                    <option value="">----------------------------------------Chọn Quận/Huyện--------------------------------------------------------</option>
 -->
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Xã/Phường</label>
                <select class="form-control ward" name="ward" id="ward">
                    <option value="">----------------------------------------Chọn Xã/Phường--------------------------------------------------------</option>

                </select>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label>Giới tính</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input gnedder" value="1" type="radio" id="active" name="gender" checked="">
                <label for="active" class="custom-control-label">Nam</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input gender" value="0" type="radio" id="no_active" name="gender">
                <label for="no_active" class="custom-control-label">Nữ</label>
            </div>
        </div>

    </div>



    <!-- /.card-body -->

    <div class="card-footer">
        <button type="button" name="add_staff" class="btn btn-primary add_staff">THÊM</button>
    </div>
    @csrf
</form>
@endsection

@section('footer')
<script type="text/javascript">
    $(document).ready(function(){
            $('.add_staff').click(function(){
                var name = $('.name').val();
                var email = $('.email').val();
                var CMND = $('.CMND').val();
                var position = $('.position').val();
                var birthday = $('.birthday').val();
                var gender = $('.gender').val();
                var city = $('.city').val();
                var district = $('.district').val();
                var ward = $('.ward').val();
                var _token = $('input[name="_token"]').val();

                // alert(name);
                // alert(email);
                // alert(CMND);
                // alert(position);
                // alert(birthday);
                // alert(gender);
                // alert(city);
                // alert(district);
                // alert(ward);
                $.ajax({
                    url : "{{url('admin/staff/add_staff')}}",
                    method: 'Post',
                    data: {
                        name:name,
                        email:email,
                        CMND:CMND,
                        position:position,
                        birthday:birthday,
                        gender:gender,
                        city:city,
                        district:district,
                        ward:ward,
                        _token:_token},
                    success:function(data){
                        alert('Thêm nhân viên thành công.');
                    }
                });

                
            });

            $('.choose').on('change',function() {
                var action =$(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var $result = '';
                // alert(action);
                // alert(matp);
                // alert(_token);
                if(action == 'city'){
                    result = 'district';
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