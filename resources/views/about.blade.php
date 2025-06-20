@extends('layout')
@section('title', 'เกี่ยวกับเรา')
@section('content')
    <h1>ผู้ก่อพัฒนาระบบ : {{ $name }}</h1>
    <h1>วันที่พัฒนาระบบ : {{ $date }}</h1>
@endsection
