@extends('layouts.admin')

@section('jss')
    {!! $jss !!}
@endsection
@section('header')
    @include('admin.header')
@endsection

@section('breadcrumbs', Breadcrumbs::render())

@section('content')
    {!! $content !!}
@endsection

@section('footer')
   @include('admin.footer')
@endsection
