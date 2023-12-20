@extends('layouts.template')

@section('content')



<div class="dashboardContainer">
<div class="jumbotron py-4 px-5">
    <div class="dashboardContainer d-grid gap-3" style="grid-template-columns: repeat(auto-fit, minmax(14rem, 1fr));">
        <div class="card bg-primary text-white">
            <div class="card-header">8</div>
            <div class="card-body">
                <h5 class="card-title">Surat Keluar</h5>
            </div>
        </div>
        <div class="card bg-primary text-white">
            <div class="card-header">8</div>
            <div class="card-body">
                <h5 class="card-title">Klasifikasi Surat</h5>
            </div>
        </div>
        <div class="card bg-primary text-white">
            <div class="card-header">8</div>
            <div class="card-body">
                <h5 class="card-title">Staff Tata Usaha</h5>
            </div>
        </div>
        <div class="card bg-primary text-white">
            <div class="card-header">8</div>
            <div class="card-body">
                <h5 class="card-title">Guru</h5>
            </div>
        </div>
    </div>
</div>
@if (Session::get('warning'))
<div class="alert alert-warning">{{ Session::get('warning') }}</div>
@endif
@if (Session::get('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
</div>

<style>
    .dashboardContainer {
        background-color: #dbdedf;
    }
</style>
@endsection
