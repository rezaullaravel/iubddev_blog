@extends('frontend.front_master')

@section('title')
{{ 'Home Page' }}
@endsection
@section('content')
@include('frontend.components.hero-section')

@include('frontend.components.blog')
@endsection
