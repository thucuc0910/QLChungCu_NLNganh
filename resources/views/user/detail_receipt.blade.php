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
                                <th style="color:RGB(15,74,146); font-size: 25px;" scope="col" colspan="6" class="text-center p-70">THÔNG TIN CHI TIẾT TIỀN THUÊ</th>
                            </tr>
                            <tr>
                                <th>Tên dịch vụ</th>
                                <th>Chỉ số đã sử dụng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <th scope="row" style="vertical-align: middle;">Tiền nhà</th>
                                <td style=" font-size: 16px; vertical-align: middle;">#</td>
                                <td style=" font-size: 16px; vertical-align: middle;">#</td>
                                <td colspan="5" style=" font-size: 16px; vertical-align: middle;">{{number_format($receipt->rent)}}VNĐ</td>
                            </tr>

                            <tr>
                                <th scope="row" style="vertical-align: middle;">Điện</th>
                                <td style=" font-size: 16px; vertical-align: middle;">{{$receipt->electricity_bill}}Kwh</td>
                                <td style=" font-size: 16px; vertical-align: middle;">{{number_format(2000)}}</td>
                                <td colspan="5" style=" font-size: 16px; vertical-align: middle;">{{number_format($receipt->electricity_bill * 2000)}}VNĐ</td>
                            </tr>

                            <tr>
                                <th scope="row" style="vertical-align: middle;">Nước</th>
                                <td style=" font-size: 16px; vertical-align: middle;">{{$receipt->water_bill}}Kwh</td>
                                <td style=" font-size: 16px; vertical-align: middle;">{{number_format(8000)}}</td>
                                <td colspan="5" style=" font-size: 16px; vertical-align: middle;">{{number_format($receipt->water_bill * 2000)}}VNĐ</td>
                            </tr>

                            @foreach($services as $service)
                            @foreach($apartment_services as $apartment_service)
                            @if($service->id == $apartment_service->service_id)
                            <tr>
                                <th scope="row" style="vertical-align: middle;">{{$service->name}}</th>
                                <td style=" font-size: 16px; vertical-align: middle;">#</td>
                                <td style=" font-size: 16px; vertical-align: middle;">{{number_format($service->price)}}</td>
                                <td colspan="5" style=" font-size: 16px; vertical-align: middle;">{{number_format($service->price)}}VNĐ</td>
                            </tr>
                            @endif
                            @endforeach
                            @endforeach

                            <tr>
                                <td colspan="3" style=" font-weight:bold; font-size: 16px; vertical-align: middle;">Tổng</td>
                                <td style="color: RGB(15,74,146); font-size: 16px; font-weight:bold;vertical-align: middle;">{{number_format($receipt->total)}}VNĐ</td>
                            </tr>

                        </tbody>

                    </table>
                </div>


            </div>
        </div>
    </div>
</section>
@endsection