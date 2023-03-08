@extends('admin.main')

@section('content')
<form method="Post">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Tình trạng</label>
                    <select class="form-control" name="status">
                        <option value="">----------------------------------------Chọn tình trạng--------------------------------------------------------</option>
                        <option value="0" {{ $receipt->status == 0 ? 'selected' : '' }}>
                            Chưa đóng
                        </option>
                        <option value="1" {{ $receipt->status == 1 ? 'selected' : '' }}>
                            Đã đóng
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" name="" class="btn btn-primary">CẬP NHẬT</button>
    </div>
    @csrf

</form>



<div class="card-footer clearfix">
</div>

@endsection