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
                    <label>Nhân viên</label>
                    <select class="form-control" name="staff_id">
                        <option value="">----------------------------------------Chọn nhân viên phụ trách--------------------------------------------------------</option>
                            
                            
                            @foreach($staffs as $staff)
                                    @foreach($staff_repairs as $re)
                                        @if($id == $re->repair_id)
                                            <option value="{{ $staff->id }}" {{ $re ->staff_id == $staff->id ? 'selected' : '' }}>{{$staff->name}}</option>
                                        @endif
                                    @endforeach
                                    <option value="{{ $staff->id }}">{{$staff->name}}</option>
                            @endforeach

                    </select>
                </div>
            </div>

            <div class="form-group col-sm-6">
                <label>Ngày hoàn thành</label>
                @if($a == 1)
                    @foreach($staff_repairs as $re)
                        @if($id == $re->repair_id)
                        <input type="date" name="date" class="form-control" value="{{$re->date}}">
                        @endif
                    @endforeach
                @elseif($a == 0)
                    <input type="date" name="date" class="form-control" value="">
                @endif

                @error ('date')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>

        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">XÁC NHẬN</button>
    </div>
    @csrf
</form>
@endsection

@section('footer')
@endsection