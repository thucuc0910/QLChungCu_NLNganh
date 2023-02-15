@extends('admin.main')

@section('head')
@endsection

@section('content')
<form action="" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Mã</label>
                    <input type="text" name="code" class="form-control" placeholder="Nhập mã của dịch vụ">
                    @error ('code')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label >Tên</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên dịch vụ">
                    @error ('name')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Giá</label>
                    <input type="text" name="price" class="form-control" placeholder="Nhập giá dịch vụ">
                    @error ('price')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Đơn vị</label>
                    <input type="text" name="unit" class="form-control" placeholder="Nhập đơn vị">
                    @error ('unit')
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