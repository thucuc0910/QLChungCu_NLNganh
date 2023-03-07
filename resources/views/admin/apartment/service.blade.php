@extends('admin.main')

@section('content')
<!-- <div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div> -->
<div class="container mt-3">
    <form>
        <div class="input-group">
            <h4 style="font-weight: bold;">Căn hộ: {{$apartment->code}}</h4>
        </div>
    </form>
</div>

<div class="card card-solid">
    <div class="card-body pb-0">

        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">STT</th>
                    <th>Dịch vụ</th>
                    <th style="width: 100px">Tuỳ biến</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($services as $key => $service)
                <tr>
                    <td>{{ $key + 1}}</td>
                    @foreach($all_service as $t => $all)
                    @if($service->service_id == $all->id)
                    <td>{{ $all->name }}</td>
                    @endif
                    @endforeach

                    <td>
                        <a href="#" class="btn btn-danger btn-sm" onclick="removeRow( {{ $service->id }} ,'/admin/apartment/service/delete')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <!-- /.card-footer -->
    <div class="card-footer clearfix">
        {!! $services->links() !!}
    </div>
</div>


@endsection