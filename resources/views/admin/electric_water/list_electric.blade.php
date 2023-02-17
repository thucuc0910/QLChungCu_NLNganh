@extends('admin.main')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>Căn hộ</th>
            <th>Tháng</th>
            <th>Chỉ số cũ</th>
            <th>Chỉ số mới</th>
            <th>Tổng</th>
            <th style="width: 100px">Tùy biến</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($electricities as $key => $electric)
        <form method="Post">
            <tr>
                <!-- <td>{{$electric->month_electric_id}}</td> -->
                <td>
                    @foreach ($apartments as $key => $apartment)
                    @if($electric->apartment_id == $apartment->id)
                        <span>{{$apartment->code}}</span>
                    @endif
                    @endforeach
                    
                </td>
                <td>
                    @foreach ($months as $key => $month)
                    @if($electric->month_electric_id == $month->id)
                        <span>{{$month->name}}</span>
                    @endif
                    @endforeach

                </td>
                <td>
                    <input name="old" type="text" value="{{$electric->old}}" min="0" />
                </td>
                <td>
                    <input name="new" type="text" value="{{$electric->new}}" />
                </td>
                <td>
                    <input name="new" type="text" value="{{$electric->total}}" />
                </td>
                <td>
                    <button type="submit" class="btn btn-primary btn btn-danger btn-sm">Xác nhận</button>
                </td>
            </tr>
            @csrf

        </form>
        @endforeach
    </tbody>
</table>

<div class="card-footer clearfix">
</div>

@endsection