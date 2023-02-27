@extends('admin.main')

@section('content')
<div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div>
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">STT</th>
            <th>Tên tài khoản</th>
            <th>Email</th>
            <th style="width: 100px"></th>
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
<div class="card-footer clearfix">
    {!! $admins->links() !!}
</div>
@endsection