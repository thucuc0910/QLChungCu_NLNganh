@extends('admin.main')

@section('head')
@endsection

@section('content')
<form action="" method="POST">
    <div class="card-body">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="code">Mã căn hộ</label>
                    <input type="text" name="code" class="form-control" placeholder="Nhập mã căn hộ">
                    @error ('code')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="floor">Tầng</label>
                    <input type="text" name="floor" class="form-control" placeholder="Nhập tầng">
                    @error ('floor')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="length">Chiều dài</label>
                    <input type="text" name="length" class="form-control" placeholder="Nhập chiều dài">
                    @error ('length')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="length">Chiều rộng</label>
                    <input type="text" name="width" class="form-control" placeholder="Nhập chiều rộng">
                    @error ('width')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Hướng</label>
                    <select class="form-control" name="direction">
                        <option value="NAM">NAM</option>
                        <option value="BẮC">BẮC</option>
                        <option value="ĐÔNG">ĐÔNG</option>
                        <option value="ĐÔNG BẮC">ĐÔNG BẮC</option>
                        <option value="ĐÔNG NAM">ĐÔNG NAM</option>
                        <option value="TÂY">TÂY</option>
                        <option value="TÂY BẮC">TÂY BẮC</option>
                        <option value="TÂY NAM">TÂY NAM</option>
                    </select>
                    @error ('status')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tình trạng</label>
                    <select class="form-control" name="status">
                        <option value="0">Trống</option>
                        <option value="1">Đã cho thuê</option>
                        <option value="2">Đang sửa chữa</option>
                    </select>
                    @error ('status')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="text" name="price" class="form-control" placeholder="Nhập giá tiền">
                @error ('price')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" placeholder=""></textarea>
                @error ('description')
                <span style="color: red;">{{ $message }}</span>
                @enderror
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