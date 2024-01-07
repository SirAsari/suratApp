@extends('layouts.template')

@section('styles')
<style>
    .component-box {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
    }

    .header {
        display: flex;
        justify-content: space-between;
    }
    
    .ttd {
        margin-top: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: right;
    }
    .space {
        margin-top: 1.5rem;
        margin-bottom: 2rem;
    }
</style>
@endsection

@section('content')
<div class="space"></div>
<a href="{{ route('letter.index') }}" class="btn btn-primary me-3">Kembali</a>
<a href="{{ route('letterType.generatePDF', $letter->id) }}" class="btn btn-primary me-3">Print</a>
<div class="component-box">
   
    <div class="header">
        <div class="left">
            <img src="/public/img/logoWK.png" width="100px" height="100px">
        </div>
        <div class="middle">
            <h4>SMK WIKRAMA BOGOR</h4>
            <hr>
            <p>
                Bisnis dan manajemen Teknologi informasi dan komunikasi Pariwisata
            </p>
        </div>
        <div class="right">
            <p>Jl. Raya Wangun Kel. Sindangsari Bogor</p>
            <p>Telp. 0251-8381101</p>
            <p>Email : prohumasi@smkwikrama.sch.id</p>
            <p>website : www.smkwikrama.sch.id</p>
        </div>
    </div>
    <hr>

    <div class="content">
        <div class="content-top">
            <p>No : {{$letter->id}}</p>
            <p>Hal : {{$letter->letter_perihal}}</p>  
        </div>
        <div class="content-bottom">
            <p>{{$letter->content}}</p>
            <p>Peserta : {{$letter->recipients}}</p>
        </div>
        <div class="ttd">
            <p>Hormat Kami,</p>
            <p>Kepala SMK Wikrama Bogor</p>
            <p>(..................)</p>
        </div>
    </div>
</div>

@endsection