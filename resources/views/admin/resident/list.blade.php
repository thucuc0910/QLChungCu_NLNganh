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
            <th>Căn hộ</th>
            <th>CMND/CCCD</th>
            <th>Số điện thoại</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Tình trạng</th>
            <th style="width: 100px">Tùy biến</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($residents as $key => $resident)
        <tr>
            <td>{{ $resident->id }}</td>
            <td>{{ $resident->name }}</td>
            <td>
                @foreach ($apartments as $key => $apartment)
                @if ($resident->apartment_id == $apartment->id)
                {{$apartment->code}}
                @endif
                @endforeach
            </td>
            <td>{{ $resident->CMND }}</td>
            <td>{{ $resident->phone }}</td>
            <td>{{ $resident->birthday }}</td>
            <td>
                @if ($resident->gender == 1)
                <p>Nam</p>
                @elseif ($resident->gender == 0)
                <p>Nữ</p>
                @endif
            </td>
            <td>{{ $resident->address }}</td>
            <td>{{ $resident->status }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="/admin/resident/edit/{{ $resident->id }}">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow( {{ $resident->id }} ,'/admin/resident/destroy')">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="card-footer clearfix">
    {!! $residents->links() !!}
</div>
@endsection