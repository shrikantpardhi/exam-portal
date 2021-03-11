@extends('layouts.master')

@section('content')

@foreach ($test as $item)
    {{$item}}
@endforeach

@endsection
