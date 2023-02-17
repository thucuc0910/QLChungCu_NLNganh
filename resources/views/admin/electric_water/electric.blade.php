@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">STT</th>
            <th>Tháng</th>
            <th>Năm</th>
            <th>Tổng</th>
            <th style="width: 100px">Tùy biến</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($electricitymonths as $key => $month)
        <tr>
            <td>{{ $month->id }}</td>
            <td>
                @foreach ($ms as $key => $m)
                    @if ($month->month_id == $m->id)
                        {{$m->name}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($years as $key => $year)
                    @if ($month->year_id == $year->id)
                        {{$year->name}}
                    @endif
                @endforeach
            </td>
            <td>{{ $month->total }}Kwh</td>

            <td>
                <a class="btn btn-primary btn-sm" href="/admin/electric_water/list/{{ $month->month_id }}">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="card-footer clearfix">
</div>
@endsection