@extends('admin.main')

@section('content')

<div class="container  mt-3 ">
    <div class="row">
        <div class="col-sm-8 row">
            <div class="text-left ">
                <a class="btn btn-primary btn-sm" href="/admin/service/add">
                    <i class="fa-solid fa-plus"></i>
                    <span>Thêm dịch vụ</span>
                </a>
            </div>

            <div class="text-left ml-1 ">
                <a class="btn btn-success btn-sm" href="/admin/service/add_ApartmentService">
                    <i class="fa-solid fa-plus"></i>
                    <span>Thêm dịch vụ cho căn hộ</span>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <form>
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded" placeholder="Nhập mã dịch vụ" />
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
                <th>Mã</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Đơn vị</th>
                <th style="width: 100px">Tùy biến</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $key => $service)
            <tr>
                <td>{{ $key + 1}}</td>
                <td>{{ $service->code }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ number_format($service->price) }}VNĐ</td>
                <td>{{ $service->unit }}</td>

                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/service/edit/{{ $service->id }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="removeRow( {{ $service->id }} ,'/admin/service/destroy')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="card-footer clearfix">
    {!! $services->links() !!}
</div>
@endsection