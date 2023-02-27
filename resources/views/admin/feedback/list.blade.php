@extends('admin.main')

@section('content')
<div class="card-header ">
    <h3 class="card-title  mt-2 mb-2 align-center">{{ $title }}</h3>
</div>
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">STT</th>
            <th>Cư dân</th>
            <th>Nội dung</th>
            <th>Ngày góp ý</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($feedbacks as $key => $feedback)
        <tr>
            <td>{{ $key + 1}}</td>
            <td>{{ $feedback->name }}</td>
            <td>{{ $feedback->content }}</td>
            <td>{{ $feedback->date }}</td>
        
        </tr>
        @endforeach
    </tbody>
</table>
<div class="card-footer clearfix">
</div>
@endsection