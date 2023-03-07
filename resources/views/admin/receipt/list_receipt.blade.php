@extends('admin.main')

@section('content')
<form method="Post">

    <div class="card-header  d-flex justify-content-end">
        <button type="submit" name="add_staff" class="btn btn-primary add_staff ">
            <i class="fa-solid fa-floppy-disk" placeholder="Lưu"></i>
        </button>
    </div>



    <div class="card-body  mb-10" id="list-electricity">
        <!-- <div class="card-header bg-primary text-white">
            <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
        </div> -->

        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 50px">STT</th>
                    <th>Căn hộ</th>
                    <th>Tháng</th>
                    <th>Năm</th>
                    <th>Tiền căn hộ</th>
                    <th>Tiền điện</th>
                    <th>Tiền nước</th>
                    <th>Tiền dịch vụ</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($receipts as $key => $receipt)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        @foreach ($apartments as $key => $apartment)
                        @if($receipt->apartment_id == $apartment->id)
                        <span>{{$apartment->code}}</span>
                        @endif
                        @endforeach

                    </td>
                    <td>
                        @foreach ($months as $key => $month)
                        @if($receipt->month_receipt_id == $month->id)
                        <span>{{$month->name}}</span>
                        @endif
                        @endforeach

                    </td>

                    <td>
                        @foreach ($years as $key => $year)
                        @if($receipt->month_receipt_id == $year->id)
                        <span>{{$year->name}}</span>
                        @endif
                        @endforeach

                    </td>

                    <td>
                        <span name="old" type="text" value="{{$receipt->old}}">{{$receipt->rent}}</span>
                    </td>

                    <td>
                        <span name="old" type="text" value="{{$receipt->old}}">{{$receipt->electricity_bill}}</span>
                    </td>

                    <td>
                        <span name="old" type="text" value="{{$receipt->old}}">{{$receipt->water_bill}}</span>
                    </td>

                    <td>
                        <span name="old" type="text" value="{{$receipt->old}}">{{$receipt->service_fee}}</span>
                    </td>

                    <td>
                        <span name="old" type="text" value="{{$receipt->old}}">{{$receipt->total}}</span>
                    </td>
                    
                    
                    <!-- <span onclick="SaveElectricity({{$receipt->id}} )">Lưu</span> -->

                </tr>
                @csrf
                @endforeach
            </tbody>
        </table>
    </div>

</form>



<div class="card-footer clearfix">
</div>

@endsection