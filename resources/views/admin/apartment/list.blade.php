@extends('admin.main')

@section('content')
<!-- <div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div> -->
<div class="container  mt-3 ">
    <div class="row">
        <div class="col-sm-8">
            <div class="text-left col-sm-6">
                <a class="btn btn-primary btn-sm" href="/admin/apartment/add">
                    <i class="fa-solid fa-plus"></i>
                    <span>Thêm căn hộ</span>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <form>
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded" placeholder="Nhập mã căn hộ" />
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<hr></hr>

<div class="card-body pb-0">
    <div class="row">
        @foreach ($apartments as $key => $apartment)
        <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    <!-- CHUNG CƯ SUNHOUSE -->
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="lead"><i class="fa-solid fa-house"></i> <b>{{ $apartment->code }}</b></h2>
                            <span class="text-muted text-sm"><b>Diện tích: </b> {{ $apartment->length }} x {{ $apartment->width }}</span><br>
                            <span class="text-muted text-sm"><b>Tầng: </b> {{ $apartment->floor }}</span>
                            <ul class="ml-2 mb-0 fa-ul text-muted">
                                <li class="small ">
                                    <i class="fas fa-lg fa-user col-sm-1"></i>
                                    <span class="col-sm-8">
                                        @foreach($residents as $resident)
                                        @if($resident->apartment_id == $apartment->id)
                                        {{$resident->name}}
                                        @endif
                                        @endforeach
                                    </span>
                                </li>
                                <li class="small ">
                                    <i class="fa-regular fa-calendar-check col-sm-1"></i>
                                    @if ($apartment->status == 0)
                                    <spam class="col-sm-8 " style="color:red">Còn trống</spam>
                                    @elseif ($apartment->status == 1)
                                    <span class="col-sm-8" style="color:blue">Đã cho thuê</span>
                                    @elseif ($apartment->status == 2)
                                    <span class="col-sm-8" style="color:green">Đang sửa chữa</span>
                                    @endif
                                </li>


                                <li class="small ">
                                    <i class="fas fa-lg fa-building col-sm-1"></i>
                                    <span class="col-sm-8">{{ $apartment->description }}</span>
                                </li>
                                <li class="small ">
                                    <i class="fas fa-lg fa-money-check-dollar col-sm-1"></i>
                                    <span class="col-sm-8">{{ number_format($apartment->price)}} VNĐ</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="text-left col-sm-6">
                            <a class="btn btn-primary btn-sm" href="/admin/apartment/service/{{ $apartment->id }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </div>

                        <div class="text-right col-sm-6">
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
<div class="card-footer clearfix">
    {!! $apartments->links() !!}
</div>
@endsection