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
                    <label>Dịch vụ</label>
                    <select class="form-control" name="service_id">
                        <option value="">----------------------------------------Chọn dịch vụ--------------------------------------------------------</option>
                        @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Căn hộ</label>
                    <select class="form-control" name="apartment_id">
                        <option value="">----------------------------------------Chọn căn hộ--------------------------------------------------------</option>
                        @foreach($apartments as $apartment)
                        <option value="{{ $apartment->id }}">{{ $apartment->code }}</option>
                        @endforeach
                    </select>
                </div>
            </div>



        </div>


        <!-- <div class="row">
            <div class="form-group col-sm-6">
                <label>Ngày bắt đầu</label>
                <input type="date" name="date_start" class="form-control">
                @error ('birtthday')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group col-sm-6">
                <label>Ngày kết thúc</label>
                <input type="date" name="date_end" class="form-control">
                @error ('birtthday')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
        </div> -->


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