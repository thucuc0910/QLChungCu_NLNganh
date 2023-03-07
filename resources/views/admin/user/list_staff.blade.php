@extends('admin.main')

@section('content')
<!-- <div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div> -->
<!-- <div class="container mb-2 mt-3">
    <form>
        <div class="input-group">
            <input type="text" name="search" class="form-control rounded" placeholder="Nhập tên tài khoản " />
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>
</div> -->

<div class="container  mt-3 ">
    <div class="row">
        <div class="col-sm-8">
            <div class="text-left col-sm-6">
                <a class="btn btn-primary btn-sm" href="/admin/account/add_staff">
                    <i class="fa-solid fa-plus"></i>
                    <span>Thêm tài khoản</span>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <form>
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded" placeholder="Nhập tên tài khoản" />
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<hr></hr>

<div class="card-body pb-0">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tên tài khoản</th>
                <th>Email</th>
                <th style="width: 100px">Tuỳ biến</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $key => $admin)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>

                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/account/edit_staff/{{ $admin->id }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="removeRow( {{ $admin->id }} ,'/admin/account/destroy_staff')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="card-footer clearfix">
    {!! $admins->links() !!}
</div>
@endsection