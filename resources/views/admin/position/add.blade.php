@extends('admin.main')

@section('head')
@endsection

@section('content')
<!-- <div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div> -->
<form action="/admin/position/add" method="POST">
    <div class="card-body">

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label >Tên chức vụ</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên chức vụ">
                    @error ('name') 
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