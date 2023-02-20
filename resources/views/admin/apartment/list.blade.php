@extends('admin.main')

@section('content')
<div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div>
<div class="card card-solid">
    <div class="card-body pb-0">

        <div class="row">
            @foreach ($apartments as $key => $apartment)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        CHUNG CƯ SUNHOUSE
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><i class="fa-solid fa-house"></i> <b>{{ $apartment->code }}</b></h2>
                                <span class="text-muted text-sm"><b>Diện tích: </b> {{ $apartment->length }} x {{ $apartment->width }}</span><br>
                                <span class="text-muted text-sm"><b>Tầng: </b> {{ $apartment->floor }}</span>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small ">
                                        <i class="fas fa-lg fa-user col-sm-2"></i>
                                        <span></span>
                                    </li>
                                    <li class="small ">
                                        <i class="fa-regular fa-calendar-check col-sm-2"></i>
                                        @if ($apartment->status == 0)
                                        <spam>Còn trống</spam>
                                        @elseif ($apartment->status == 1)
                                        <span>Đã cho thuê</span>
                                        @elseif ($apartment->status == 2)
                                        <span>Đang sửa chữa</span>
                                        @endif
                                    </li>

                                    <li class="small ">
                                        <i class="fas fa-lg fa-building col-sm-2"></i>
                                        <span>{{ $apartment->description }}</span>
                                    </li>
                                    <li class="small ">
                                        <i class="fas fa-lg fa-money-check-dollar col-sm-2"></i>
                                        <span>{{ number_format($apartment->price)}} VNĐ</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">

                            <div class="text-right col-sm-12">
                                <a class="btn btn-primary btn-sm" href="/admin/apartment/edit/{{ $apartment->id }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="#" class="btn btn-danger btn-sm" onclick=" removeRow({{ $apartment->id }} , '/admin/apartment/destroy')">
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
    {!! $apartments->links() !!}
</div>
@endsection