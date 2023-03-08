@extends('user.main')

@section('user.content')
<!-- Slider -->

<!-- Content -->
<section class="bg0 p-t-130 p-b-50" style="opacity: .8">
    <div class="page_contact p-b-70">
        <div class="container shadow-lg p-5 mb-5 bg-body-tertiary rounded">
            <div class="row">

                <div class="select_maps col-md-12 col-sm-12 col-xs-12 ">
                    <table class="table table-bordered  shadow-lg p-5 mb-5 bg-body-tertiary rounded  m-t-30 m-l-20" style="height: 500px; width:1000px; ">
                        <thead>
                            <tr class="p-t-50">
                                <th style="color:RGB(15,74,146); font-size: 25px;" scope="col" colspan="6" class="text-center p-70">THÔNG TIN TIỀN THUÊ</th>
                            </tr>
                            <tr>
                                <th style="width: 50px">STT</th>
                                <th>Tháng</th>
                                <th>Năm</th>
                                <th>Phải đóng</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($receipts as $key => $receipt)
                            <tr>
                                <td>{{ $key + 1}}</td>
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
                                <td>{{ $receipt->total }}</td>
                                <td>
                                    @if($receipt->status==0)
                                    <span style="color:red">
                                        Chưa đóng
                                    </span>
                                    @elseif($receipt->status==1)
                                    <span style="color:green">
                                        Đã đóng
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>


            </div>
        </div>
    </div>
</section>
@endsection