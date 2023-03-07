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
                    <label for="code">Mã căn hộ</label>
                    <input type="text" name="code" class="form-control" placeholder="Nhập mã căn hộ" value="{{$apartment->code}}">
                    @error ('code')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="floor">Tầng</label>
                    <input type="text" name="floor" class="form-control" placeholder="Nhập tầng" value="{{$apartment->floor}}">
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
                    <input type="text" name="length" class="form-control" placeholder="Nhập chiều dài" value="{{$apartment->length}}">
                    @error ('length')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="length">Chiều rộng</label>
                    <input type="text" name="width" class="form-control" placeholder="Nhập chiều rộng" value="{{$apartment->width}}">
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
                        <option value="NAM" {{$apartment->direction == 'NAM' ? 'selected="" ' : ''}}>NAM</option>
                        <option value="BẮC" {{$apartment->direction == 'BẮC' ? 'selected="" ' : ''}}>BẮC</option>
                        <option value="ĐÔNG" {{$apartment->direction == 'ĐÔNG' ? 'selected="" ' : ''}}>ĐÔNG</option>
                        <option value="ĐÔNG BẮC" {{$apartment->direction == 'ĐÔNG BẮC' ? 'selected="" ' : ''}}>ĐÔNG BẮC</option>
                        <option value="ĐÔNG NAM" {{$apartment->direction == 'ĐÔNG NAM' ? 'selected="" ' : ''}}>ĐÔNG NAM</option>
                        <option value="TÂY" {{$apartment->direction == 'TÂY' ? 'selected="" ' : ''}}>TÂY</option>
                        <option value="TÂY BẮC" {{$apartment->direction == 'TÂY NAM' ? 'selected="" ' : ''}}>TÂY BẮC</option>
                        <option value="TÂY NAM" {{$apartment->direction == 'TÂY BẮC' ? 'selected="" ' : ''}}>TÂY NAM</option>
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
                        <option value="0" {{$apartment->status == 0 ? 'selected="" ' : ''}}>Trống</option>
                        <option value="1" {{$apartment->status == 1 ? 'selected="" ' : ''}}>Đã cho thuê</option>
                        <option value="2" {{$apartment->status == 2 ? 'selected="" ' : ''}}>Đang sửa chữa</option>
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
                <input type="text" name="price" class="form-control" placeholder="Nhập giá tiền" value="{{$apartment->price}}">
                @error ('price')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" placeholder="" value="">{{$apartment->description}}</textarea>
                @error ('description')
                <span style="color: red;">{{ $message }}</span>
                @enderror
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