@extends('brackets/admin-ui::admin.layout.master')

@section('title', trans('admin.store.actions.index'))

@section('styles')
    <link href='https://fonts.googleapis.com/css?family=Germania One' rel='stylesheet'>
    <link rel="stylesheet" href="/css/mobile/store.css">
@endsection

@section('header')
    @include('admin.layout.components.mobile')
@endsection

@section('footer')
    @include('admin.layout.mobile.footer')
@endsection

@section('bottom-scripts')
    @parent
@endsection
