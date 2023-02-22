@extends('admin.main')

@section('content')



<div class="card-header bg-white  d-flex justify-content-end">
    <button type="button" name="" class="btn btn-secondary">
        <a href="/admin/electric_water/water/add_month">
            <i class="fa-regular fa-square-plus"></i>
            <span>Tháng tiếp theo</span>
        </a>
    </button>
</div>


<div class="card-body  mb-10" id="list-electricity">


    <div class="card-header bg-primary text-white">
        <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tháng</th>
                <th>Năm</th>
                <th style="width: 100px"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($watermonths as $key => $month)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    @foreach ($ms as $a => $m)
                    @if ($month->month_id == $m->id)
                    {{$m->name}}
                    @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($years as $b => $year)
                    @if ($month->year_id == $year->id)
                    {{$year->name}}
                    @endif
                    @endforeach
                </td>
                
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/electric_water/water/list/{{ $month->month_id }}">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="card-footer clearfix">
</div>
@endsection