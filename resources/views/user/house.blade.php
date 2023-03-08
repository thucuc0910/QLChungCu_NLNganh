@extends('user.main')

@section('user.content')
<!-- Slider -->

<!-- Content -->
<section class="bg0 p-t-150 p-b-50" style="opacity: .8">
    <div class="page_contact p-b-70">
        <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <div class="row">
                <!-- Bảng thông tin của cư dân -->
                <div class="select_maps col-md-6 col-sm-12 col-xs-12 ">
                    <table class="table table-bordered shadow-lg p-3 mb-5 bg-body-tertiary rounded m-t-30">
                        <thead>
                            <tr>
                                <th style="color:black; font-size: 20px;" scope="col" colspan="4" class="text-center">THÔNG TIN CƯ DÂN</th>

                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach($residents as $key => $resident)
                            @if($resident->id == auth('web')->user()->id)
                            @foreach($apartments as $a => $apartment)
                            @if($apartment->id == $resident->apartment_id)
                            <tr>
                                <th scope="row">Căn hộ</th>
                                <td colspan="3" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold">{{$apartment->code}}</td>
                            </tr>
                            @endif
                            @endforeach
                            <tr>
                                <th scope="row">Họ và tên</th>
                                <td colspan="3" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold">{{$resident->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Số điện thoại</th>
                                <td colspan="3" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold">{{$resident->phone}}</td>
                            </tr>
                            <tr>
                                <th scope="row">CMND</th>
                                <td colspan="3" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold">{{$resident->CMND}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Giới tính</th>
                                <td colspan="3" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold">
                                    @if($resident->gender == 0)
                                    <span>Nữ</span>
                                    @elseif($resident->gender ==1)
                                    <span>Nam</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Ngày sinh</th>
                                <td colspan="3" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold">{{$resident->birthday}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Quê quán</th>
                                <td colspan="3" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold">{{$resident->address}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tinh trạng</th>
                                <td colspan="3" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold">{{$resident->status}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Tuỳ biên -->
                <div class="select_maps col-md-6 col-sm-12 col-xs-12">
                    <table class="table table-borderless shadow-lg p-3 mb-5 bg-body-tertiary rounded m-t-30" style="height: 435px; width:600px">
                        <tr>
                            <td colspan="2" class=" text-center" style="vertical-align: bottom;">
                                <a href="/user/apartment/{{auth('web')->user()->id}}">
                                    <i class="fa-solid fa-building-user " style="font-size: 50px; color: RGB(15,74,146);"></i>
                                </a>
                            </td>
                            <td colspan="2" class=" text-center" style="vertical-align: bottom;">
                                <a href="/user/electricity_water/{{auth('web')->user()->id}}">
                                    <i class="fa-solid fa-file-invoice-dollar" style="font-size: 50px; color: RGB(15,74,146);"></i>
                                    <!-- <i class="fa-solid fa-bolt" style="font-size: 50px; color: RGB(15,74,146);"></i> -->
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class=" text-center" style="color: black; font-size: 16px; font-weight:bold">
                                THÔNG TIN CĂN HỘ
                            </td>
                            <td colspan="2" class=" text-center" style="color: black; font-size: 16px; font-weight:bold">
                                TIỀN THUÊ
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" class=" text-center" style="vertical-align: bottom;">
                                <a href="/user/feedback/{{auth('web')->user()->id}}">
                                    <i class="fa-solid fa-book" style="font-size: 50px; color: RGB(15,74,146);"></i>
                                </a>
                            </td>
                            <td colspan="2" class=" text-center" style="vertical-align: bottom;">
                                <a href="/user/repair/{{auth('web')->user()->id}}">
                                    <i class="fa-solid fa-toolbox" style="font-size: 50px; color: RGB(15,74,146);"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class=" text-center" style="color: black; font-size: 16px; font-weight:bold">
                                GÓP Ý
                            </td>
                            <td colspan="2" class=" text-center" style="color: black; font-size: 16px; font-weight:bold">
                                YÊU CẦU SỬA CHỮA
                            </td>
                        </tr>
                    </table>
                </div>


            </div>
        </div>
    </div>
</section>
@endsection