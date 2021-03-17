@extends('layouts.master')

@section('content')

@foreach ($test as $item)
    {{$item}}
    @php
        session(['key' => 'x']);
    @endphp
    {{ session('key') }}
@endforeach

@endsection
