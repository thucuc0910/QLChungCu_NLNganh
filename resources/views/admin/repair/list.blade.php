@extends('admin.main')

@section('content')
<div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div>
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">STT</th>
            <th>Căn hộ</th>
            <th>Người yêu cầu</th>
            <th>Nội dung</th>
            <th>Tình trạng</th>
            <th>Ngày yêu cầu</th>
            <th style="width: 100px"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($repairs as $key => $repair)
        <tr>
            <td>{{ $key + 1}}</td>
            <td>
                @foreach($apartments as $a => $apartment)
                    @if($repair->apartment_id == $apartment->id)
                    {{$apartment->code}}
                    @endif
                @endforeach
            </td>
            <td>{{ $repair->name }}</td>
            <td>{{ $repair->content }}</td>
            <td>
                @if ($repair->status == 0)
                <p style="color:red">Đang chờ xử lý</p>
                @elseif ($repair->status == 1)
                <p style="color: orange;">Đang tiến thành</p>
                @elseif ($repair->status == 2)
                <p style="color: green;">Đã hoàn thành</p>
                @endif
            </td>
            <td>{{ $repair->date }}</td>
            <td>
                
            </td>
           
            <td>
                <a class="btn btn-primary btn-sm" href="/admin/repair/edit/{{ $repair->id }}">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="card-footer clearfix">
    {!! $repairs->links() !!}
</div>
@endsection