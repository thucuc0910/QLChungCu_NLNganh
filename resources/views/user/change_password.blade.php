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
                        <h3 class="card-title p-l-400  mt-2 mb-2 text-center" style="color: RGB(15,74,146); font-weight: bold; font-size: 25px">THAY ĐỔI MẬT KHẨU</h3>
                    </div>

                    <form action="/user/changePassword" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Mật khẩu cũ</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput" placeholder="">
                                @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Mật khẩu mới</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput" placeholder="">
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Nhập lại mật khẩu mới</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput" placeholder="">
                            </div>

                        </div>

                        <div class="m-l-30 p-b-50" style="width: 110px; height: 20px">
                            <button type="submit" class="btn btn-primary">XÁC NHẬN</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection