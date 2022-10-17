
@extends('layouts.client')
{{-- @section('title')
    {{ $title }}
@endsection --}}

{{-- @section('sidebar')
    <h3>Add SideBar</h3>
@endsection --}}

@section('content')
    <h1>Them san pham</h1>
    <form action="" method="post">
        <input type="text", name="username">
        @csrf
        <button type="submit" name="sm">Submit</button>
        @method('PUT')
    </form>
    
@endsection

@section('css')
@endsection

@section('js')
@endsection

