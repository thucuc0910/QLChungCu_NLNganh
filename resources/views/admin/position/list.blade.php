@extends('admin.main')

@section('content')
<!-- <div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div> -->

<div class="container  mt-3 ">
    <div class="row">
        <div class="col-sm-8">
            <div class="text-left col-sm-6">
                <a class="btn btn-primary btn-sm" href="/admin/position/add">
                    <i class="fa-solid fa-plus"></i>
                    <span>Thêm chức vụ</span>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <form>
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded" placeholder="Nhập tên chức vụ" />
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<hr>
</hr>

<div class="card-body pb-0">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Họ và tên</th>
                <th style="width: 100px">Tùy biến</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($positions as $key => $position)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $position->name }}</td>

                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/position/edit/{{ $position->id }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="removeRow( {{ $position->id }} ,'/admin/position/destroy')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="card-footer clearfix">
    {!! $positions->links() !!}
</div>
@endsection