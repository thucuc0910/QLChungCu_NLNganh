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
          <label for="user">Tên tài khoản</label>
          <input type="text" name="name" class="form-control" placeholder="Nhập tên chủ tài khoản">
          @error ('name')
          <span style="color: red;">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-sm-6">

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" class="form-control" placeholder="Nhập email">
          @error ('email')
          <span style="color: red;">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="password">Mật khẩu</label>
          <input type="text" name="password" class="form-control" placeholder="Nhập password">
          @error ('password')
          <span style="color: red;">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label>Nhân viên</label>
          <select class="form-control" name="staff_id">
            <option value="">----------------------------------------Chọn nhân viên--------------------------------------------------------</option>
            @foreach($staffs as $staff)
            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
            @endforeach
          </select>
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