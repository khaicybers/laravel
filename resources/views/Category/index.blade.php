@extends('layouts.master') <!-- Kế thừa master.blade.php -->
@section('main')
<h2>Danh sách danh mục</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>STATUS</th>
        </tr>
    </thead>
    <tbody>
        <!-- cú pháp của blade view -->
         
        @foreach($cats as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->status}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Hiển thị phân trang -->
{{$cats->links()}}
@stop()
