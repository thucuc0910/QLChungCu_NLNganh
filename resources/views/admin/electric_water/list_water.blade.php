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
                @foreach ($waters as $key => $water)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>
                        @foreach ($apartments as $key => $apartment)
                        @if($water->apartment_id == $apartment->id)
                        <span>{{$apartment->code}}</span>
                        @endif
                        @endforeach

                    </td>
                    <td>
                        @foreach ($months as $key => $month)
                        @if($water->month_water_id == $month->id)
                        <span>{{$month->name}}</span>
                        @endif
                        @endforeach

                    </td>
                    <td>
                        <span name="old" type="text" value="{{$water->old}}">{{$water->old}}</span>

                    </td>
                    <td>
                        <input class="new" name="new[{{$water->id}}]" id="new" type="text" value="{{$water->new}}" />
                    </td>
                    <td>
                        <span name="" type="text" value="">
                            @if($water->new == 0)
                            {{$water->new}}
                            @elseif($water->new !=0 )
                            {{$water->new - $water->old}}
                            @endif
                        </span>
                    </td>
                    <!-- <span onclick="SaveElectricity({{$water->id}} )">Lưu</span> -->

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