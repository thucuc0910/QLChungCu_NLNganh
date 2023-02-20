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
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Loại</th>
            {{-- <th>Active</th> --}}
            <!-- <th>Update</th> -->
            <th style="width: 100px">Tùy biến</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            {{-- <td>{!! \App\Helpers\Helper::active($user->active) !!}</td> --}}
            <td>@if ($user->type == 'adm')
                <p>Quản lý</p>
                @elseif ($user->type == 'usr')
                <p>Người dùng</p>
                @elseif ($user->type == 'stf')
                <p>Nhân viên</p>
                @endif
            </td>
            <!-- <td>@if ($user->status == 1) 
                            <span class="btn btn-success btn-sm">YES</span>
                        @elseif ($user->status == 0)
                            <span class="btn btn-danger btn-sm">NO</span>   
                    @endif</td> -->
            <td>
                <a class="btn btn-primary btn-sm" href="/admin/account/edit/{{ $user->id }}">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow( {{ $user->id }} ,'/admin/account/destroy')">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="card-footer clearfix">
    {!! $users->links() !!}
</div>
@endsection