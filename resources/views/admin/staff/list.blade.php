@extends('admin.main')

@section('content')
<!-- <div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div> -->

<div class="container  mt-3 ">
    <div class="row">
        <div class="col-sm-8">
            <div class="text-left col-sm-6">
                <a class="btn btn-primary btn-sm" href="/admin/staff/add">
                    <i class="fa-solid fa-plus"></i>
                    <span>Thêm nhân viên</span>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <form>
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded" placeholder="Nhập tên nhân viên" />
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<hr>
</hr>

<div class="card-body pb-0">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Họ và tên</th>
                <th>Số điện thoại</th>
                <th>CMND/CCCD</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Chức vụ</th>
                <th style="width: 100px">Tùy biến</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $key => $staff)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $staff->name }}</td>
                <td>{{ $staff->phone }}</td>
                <td>{{ $staff->CMND }}</td>
                <td>
                    @if ($staff->gender == 1)
                    <p>Nam</p>
                    @elseif ($staff->gender == 0)
                    <p>Nữ</p>
                    @endif
                </td>
                <td>{{ $staff->birthday }}</td>
                <td>
                    @foreach ($positions as $a => $position)

                    @if ($staff->position_id == $position->id)
                    <p>{{$position->name}}</p>
                    @endif
                    @endforeach
                </td>
                <!-- <td>@if ($staff->status == 1) 
                            <span class="btn btn-success btn-sm">YES</span>
                        @elseif ($staff->status == 0)
                            <span class="btn btn-danger btn-sm">NO</span>   
                    @endif</td> -->
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/staff/edit/{{ $staff->id }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="removeRow( {{ $staff->id }} ,'/admin/staff/destroy')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="card-footer clearfix">
    {!! $staffs->links() !!}
</div>
@endsection