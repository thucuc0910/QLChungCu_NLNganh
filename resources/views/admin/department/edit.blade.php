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
                    <input type="text" name="code" class="form-control" placeholder="Nhập mã căn hộ" value="{{$department->code}}">
                    @error ('code')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="floor">Tầng</label>
                    <input type="text" name="floor" class="form-control" placeholder="Nhập tầng" value="{{$department->floor}}">
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
                    <input type="text" name="length" class="form-control" placeholder="Nhập chiều dài" value="{{$department->length}}">
                    @error ('length')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="length">Chiều rộng</label>
                    <input type="text" name="width" class="form-control" placeholder="Nhập chiều rộng" value="{{$department->width}}">
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
                    
                        <option value="NAM" {{$department->direction == 'NAM' ? 'selected="" ' : ''}} >NAM</option>
                        <option value="BẮC" {{$department->direction == 'BẮC' ? 'selected="" ' : ''}}>BẮC</option>
                        <option value="ĐÔNG" {{$department->direction == 'ĐÔNG' ? 'selected="" ' : ''}}>ĐÔNG</option>
                        <option value="ĐÔNG BẮC" {{$department->direction == 'ĐÔNG BẮC' ? 'selected="" ' : ''}}>ĐÔNG BẮC</option>
                        <option value="ĐÔNG NAM" {{$department->direction == 'ĐÔNG NAM' ? 'selected="" ' : ''}}>ĐÔNG NAM</option>
                        <option value="TÂY" {{$department->direction == 'TÂY' ? 'selected="" ' : ''}}>TÂY</option>
                        <option value="TÂY BẮC" {{$department->direction == 'TÂY NAM' ? 'selected="" ' : ''}}>TÂY BẮC</option>
                        <option value="TÂY NAM" {{$department->direction == 'TÂY BẮC' ? 'selected="" ' : ''}}>TÂY NAM</option>
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
                        <option value="0" {{$department->status == 0 ? 'selected="" ' : ''}}>Trống</option>
                        <option value="1" {{$department->status == 1 ? 'selected="" ' : ''}}>Đã cho thuê</option>
                        <option value="2" {{$department->status == 2 ? 'selected="" ' : ''}}>Đang sửa chữa</option>
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
                <input type="text" name="price" class="form-control" placeholder="Nhập giá tiền" value="{{$department->price}}">
                @error ('price')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" placeholder="" value="">{{$department->description}}</textarea>
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