@extends('admin.main')

@section('content')
<!-- <div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div> -->
<div class="card-body pb-0">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Căn hộ</th>
                <th>Người yêu cầu</th>
                <th>Nội dung</th>
                <th>Tình trạng</th>
                <th>Ngày yêu cầu</th>
                <th>Ngày hoàn thành</th>
                <th>Người thực hiện</th>
                <th style="width: 100px">Tuỳ biến</th>
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
                <td>{{ date("d-m-Y", strtotime($repair->date)) }}</td>
                <td>
                    @foreach($staff_repairs as $staff_repair)
                        @if($staff_repair->repair_id == $repair->id)
                            @if($staff_repair->date != NULL)
                            {{date("d-m-Y", strtotime($staff_repair->date))}}
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($staff_repairs as $staff_repair)
                        @if($staff_repair->repair_id == $repair->id)
                            @foreach($staffs as $staff)
                                @if($staff->id == $staff_repair->staff_id)
                                    {{$staff->name}}
                                @endif
                            @endforeach
                        @endif
                    @endforeach
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
</div>

<div class="card-footer clearfix">
    {!! $repairs->links() !!}
</div>
@endsection