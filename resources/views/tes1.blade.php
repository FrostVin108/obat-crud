@extends('layout.main')

@section('content_header')
    <h1>Edit Obat</h1>
@stop

@section('content')
    {{-- @foreach ($obat as $ob) --}}
        {{$obat->obat}}
        
    {{-- @endforeach --}}
    
    <a>tes</a>
@stop