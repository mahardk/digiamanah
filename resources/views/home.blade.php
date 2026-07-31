@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

    @include('components.hero')
    @include('components.statistics')
    @include('components.running')
    @include('components.about')
    @include('components.umkm_unggulan')
    @include('components.kategori')
    @include('components.produk_terbaru')
    @include('components.joinNow')
    @include('components.searchUMKM')
    @include('components.footer')

@endsection
