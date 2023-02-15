@extends('admin.main')

@section('content')

<div class="card card-solid">
    <div class="card-body pb-0">

        <div class="row">
            @foreach ($departments as $key => $department)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        CHUNG CƯ SUNHOUSE
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><i class="fa-solid fa-house"></i> <b>{{ $department->code }}</b></h2>
                                <span class="text-muted text-sm"><b>Diện tích: </b> {{ $department->length }} x {{ $department->width }}</span><br>
                                <span class="text-muted text-sm"><b>Tầng: </b> {{ $department->floor }}</span>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><i class="fas fa-lg fa-user "></i></li>
                                    <li class="small">
                                        <i class="fa-regular fa-calendar-check"></i>
                                        @if ($department->status == 0)
                                        <spam>Còn trống</spam>
                                        @elseif ($department->status == 1)
                                        <span>Đã cho thuê</span>
                                        @elseif ($department->status == 2)
                                        <span>Đang sửa chữa</span>
                                        @endif
                                    </li>

                                    <li class="small"><i class="fas fa-lg fa-building"></i> {{ $department->description }}</li>
                                    <li class="small"><i class="fas fa-lg fa-money-check-dollar"></i> {{ number_format($department->price)}} VNĐ</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">

                            <div class="text-right col-sm-12">
                                <a class="btn btn-primary btn-sm" href="/admin/department/edit/{{ $department->id }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="#" class="btn btn-danger btn-sm" onclick=" removeRow({{ $department->id }} , '/admin/department/destroy')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>

                        </div>



                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- /.card-footer -->
</div>

<div class="card-footer clearfix">
    {!! $departments->links() !!}
</div>
@endsection