@extends('admin.main')

@section('content')


<div class="container  mt-3 ">
    <div class="row">
        <div class="col-sm-8">
            <div class="text-left col-sm-6">
                <a class="btn btn-primary btn-sm" href="/admin/resident/add">
                    <i class="fa-solid fa-plus"></i>
                    <span>Thêm cư dân</span>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <form>
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded" placeholder="Nhập tên cư dân" />
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<hr></hr>

<div class="card-body pb-0">


    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Họ và tên</th>
                <th>Căn hộ</th>
                <th>CMND/CCCD</th>
                <th>Số điện thoại</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Tình trạng</th>
                <th style="width: 100px">Tùy biến</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($residents as $key => $resident)
            <tr>
                <td>{{ $key +1 }}</td>
                <td>{{ $resident->name }}</td>
                <td>
                    @foreach ($apartments as $key => $apartment)
                    @if ($resident->apartment_id == $apartment->id)
                    {{$apartment->code}}
                    @endif
                    @endforeach
                </td>
                <td>{{ $resident->CMND }}</td>
                <td>{{ $resident->phone }}</td>
                <td>{{ $resident->birthday }}</td>
                <td>
                    @if ($resident->gender == 1)
                    <p>Nam</p>
                    @elseif ($resident->gender == 0)
                    <p>Nữ</p>
                    @endif
                </td>
                <td>{{ $resident->address }}</td>
                <td>{{ $resident->status }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/resident/edit/{{ $resident->id }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="removeRow( {{ $resident->id }} ,'/admin/resident/destroy')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer clearfix">
    {!! $residents->links() !!}
</div>
@endsection