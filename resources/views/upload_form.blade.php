@extends('layouts.master')  <!-- Or the layout you want to extend -->

@section('main')
<div class="container">
    <br>
    <!-- Display success message if upload was successful -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('home.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <legend>Form upload</legend>

        <div class="form-group">
            <label for="image">Chọn ảnh</label>
            <input type="file" class="form-control" name="image" />
            @error('image') 
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
