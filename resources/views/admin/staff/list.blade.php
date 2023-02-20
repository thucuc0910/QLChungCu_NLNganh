@extends('admin.main')

@section('content')
<div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div>
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>CMND/CCCD</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Chức vụ</th>
            <th style="width: 100px">Tùy biến</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($staffs as $key => $staff)
        <tr>
            <td>{{ $staff->id }}</td>
            <td>{{ $staff->name }}</td>
            <td>{{ $staff->email }}</td>
            <td>{{ $staff->CMND }}</td>
            <td>
                @if ($staff->gender == 1)
                <p>Nam</p>
                @elseif ($staff->gender == 0)
                <p>Nữ</p>
                @endif
            </td>
            <td>{{ $staff->birthday }}</td>
            <td>@if ($staff->position == 'adm')
                <p>Quản lý</p>
                @elseif ($staff->position == 'stf')
                <p>Nhân viên</p>
                @endif
            </td>
            <!-- <td>@if ($staff->status == 1) 
                            <span class="btn btn-success btn-sm">YES</span>
                        @elseif ($staff->status == 0)
                            <span class="btn btn-danger btn-sm">NO</span>   
                    @endif</td> -->
            <td>
                <a class="btn btn-primary btn-sm" href="/admin/staff/edit/{{ $staff->id }}">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow( {{ $staff->id }} ,'/admin/staff/destroy')">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="card-footer clearfix">
    {!! $staffs->links() !!}
</div>
@endsection