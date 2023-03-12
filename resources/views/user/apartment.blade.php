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
                                <th style="color:RGB(15,74,146); font-size: 25px;" scope="col" colspan="6" class="text-center p-70">THÔNG TIN CĂN HỘ</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <th scope="row" style="vertical-align: middle;">Mã căn hộ</th>
                                <td colspan="5" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold;vertical-align: middle;">{{$apartment->code}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Tầng</th>
                                <td colspan="5" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold;vertical-align: middle;">{{$apartment->floor}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Chiều dài</th>
                                <td colspan="5" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold;vertical-align: middle;">{{$apartment->length}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Chiều rộng</th>
                                <td colspan="5" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold;vertical-align: middle;">{{$apartment->width}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Hướng</th>
                                <td colspan="5" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold;vertical-align: middle;">{{$apartment->direction}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Mô tả</th>
                                <td colspan="5" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold;vertical-align: middle;">{{$apartment->description}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Giá</th>
                                <td colspan="5" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold;vertical-align: middle;">{{number_format($apartment->price)}}VNĐ</td>
                            </tr>

                            <tr>
                                <th scope="row">Tình trạng</th>
                                <td colspan="5" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold;vertical-align: middle;">{{$apartment->status}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Dịch vụ</th>
                                <td colspan="5" style="color: RGB(15,74,146); font-size: 16px; font-weight:bold;vertical-align: middle;">
                                    @foreach($services as $c => $d)
                                    @foreach($services_apartment as $a => $b)
                                    @if($b->service_id == $d->id)
                                    <ul class="row">
                                        <li class="col-sm-3">{{$d->name}}</li>
                                        <li class="col-sm-3">{{number_format($d->price)}}VNĐ</li>
                                        <li class="col-sm-3">{{$b->date_start}}</li>
                                        <li class="col-sm-3">{{$b->date_end}}</li>
                                    </ul>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>


            </div>
        </div>
    </div>
</section>
@endsection