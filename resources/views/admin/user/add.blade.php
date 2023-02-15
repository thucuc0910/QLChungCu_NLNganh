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
          <input type="text" name="name" class="form-control" placeholder="Nhập tên chủ tài khoản">
          @error ('name')
          <span style="color: red;">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label for="phone">Số điện thoại</label>
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
          <label for="email">Email</label>
          <input type="text" name="email" class="form-control" placeholder="Nhập email">
          @error ('email')
          <span style="color: red;">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label for="password">Mật khẩu</label>
          <input type="text" name="password" class="form-control" placeholder="Nhập password">
          @error ('password')
          <span style="color: red;">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">

        <div class="form-group">
          <label>Căn hộ</label>
          <select class="form-control" name="department_code">
            @foreach($departments as $department)
            <option value="{{ $department->id }}">{{ $department->code }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label>Loại</label>
          <select class="form-control" name="type">
            <option value="adm">Quản lý</option>
            <option value="stf">Nhân viên</option>
            <option value="usr">Người dùng</option>
          </select>
          @error ('type')
          <span style="color: red;">{{ $message }}</span>
          @enderror
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