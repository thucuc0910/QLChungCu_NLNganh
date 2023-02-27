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
            {{-- <th>Active</th> --}}
            <!-- <th>Update</th> -->
            <th style="width: 100px">Tùy biến</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
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