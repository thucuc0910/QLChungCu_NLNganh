@extends('admin.main')

@section('content')
<form method="Post">

    <div class="card-header  d-flex justify-content-end">
        <button type="submit" name="add_staff" class="btn btn-secondary add_staff ">
            <i class="fa-solid fa-floppy-disk" placeholder="Lưu"></i>
        </button>
    </div>



    <div class="card-body  mb-10" id="list-electricity">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 50px">STT</th>
                    <th>Căn hộ</th>
                    <th>Tháng</th>
                    <th>Chỉ số cũ</th>
                    <th>Chỉ số mới</th>
                    <th>Tổng(kwh)</th>
                    <!-- <th style="width: 100px">
                        <a class="btn btn-primary btn-sm">
                            <button type="button" class="btn btn-primary">THÊM</button>

                        </a>
                    </th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($electricities as $key => $electric)
                <tr>
                    <td>{{$key+1}}</td>
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
                        <span name="old" type="text" value="{{$electric->old}}">{{$electric->old}}</span>

                    </td>
                    <td>
                        <input class="new" name="new[{{$electric->id}}]" id="new" type="text" value="{{$electric->new}}" />
                    </td>
                    <td>
                        <span name="" type="text" value="">
                            @if($electric->new == 0)
                            {{$electric->new}}
                            @elseif($electric->new !=0 )
                            {{$electric->new - $electric->old}}
                            @endif
                        </span>
                    </td>
                    <!-- <span onclick="SaveElectricity({{$electric->id}} )">Lưu</span> -->

                </tr>
                @csrf
                @endforeach
            </tbody>

            <tfoot class="table-secondary">
                <td colspan="5">

                    <h5 class="bold">TỔNG</h5>
                </td>
                <td colspan="2">
                    <h5>{{$total}}</h5>
                </td>
            </tfoot>

        </table>
    </div>

</form>



<div class="card-footer clearfix">
</div>

@endsection