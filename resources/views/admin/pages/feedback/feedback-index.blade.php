@extends('admin.app')

@section('title', __('Tanggapan & Masukan'))

@php
    $breadcrumbs = [
        [
            'label' => __('Tanggapan & Masukan'),
        ],
    ];
@endphp

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Daftar Tanggapan & Masukan') }}</h3>
        </div>
        <div class="card-body">
            <livewire:tables.feedbacks-table />
        </div>
    </div>
@endsection
