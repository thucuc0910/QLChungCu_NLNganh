@extends('user.main')

@section('user.content')
<!-- Content -->
<section class="bg0 p-t-130 p-b-50" style="opacity: .8">
    <div class="page_contact p-b-70">
        <div class="container shadow-lg p-5 mb-5 bg-body-tertiary rounded">
            <div class="row">
                <div class="select_maps col-md-12 col-sm-12 col-xs-12 ">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <div class="card-header">
                        <h3 class="card-title p-l-400  mt-2 mb-2 text-center" style="color: RGB(15,74,146); font-weight: bold; font-size: 25px">YÊU CẦU SỬA CHỮA</h3>
                    </div>
                    <form action="/user/repair/{{auth('web')->user()->id}}" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea type="text" name="content" class="form-control" placeholder="Nhập nội dung cần sửa chữa"></textarea>
                                        @error ('content')
                                        <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="m-l-30 p-b-50" style="width: 70px; height: 20px">
                            <button type="submit" class="btn btn-primary">THÊM</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection