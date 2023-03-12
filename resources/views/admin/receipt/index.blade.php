@extends('admin.main')
@section('content')
<div class="card-header bg-white  d-flex justify-content-end">
    <button type="button" name="" class="btn btn-primary">
        <a href="/admin/receipt/add_month">
            <i class="fa-solid fa-calendar-plus"></i>
        </a>
    </button>
</div>


<div class="card-body  mb-10" id="list-electricity">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Tháng</th>
                <th>Năm</th>
                <th style="width: 100px">Tuỳ biến</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receipt_months as $key => $receipt)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    @foreach ($ms as $a => $m)
                    @if ($receipt->month_id == $m->id)
                    {{$m->name}}
                    @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($years as $b => $year)
                    @if ($receipt->year_id == $year->id)
                    {{$year->name}}
                    @endif
                    @endforeach
                </td>

                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/receipt/list_receipt/{{ $receipt->id }}">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a class="btn btn-success btn-sm" href="/admin/receipt/print_receipt/{{ $receipt->id }}">
                        <i class="fa-solid fa-print"></i>
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