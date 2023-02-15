@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Mã</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Đơn vị</th>
                <th style="width: 100px">Tùy biến</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $key => $service) 
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->code }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->price }}</td>
                <td>{{ $service->unit }}</td>

                <td> 
                    <a class="btn btn-primary btn-sm" href="/admin/service/edit/{{ $service->id }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="removeRow( {{ $service->id }} ,'/admin/service/destroy')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
    {!! $services->links() !!}
    </div>
@endsection