@extends('layouts.template')

@section('content')
<form action="{{ route('letterType.store') }}" method="POST" class="card p-5">
        @csrf

        @if(Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success') }} </div>
        @endif
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    <p class="fs-3 bold">Tambah Data Klasifikasi Surat</p>
    <p class="fs-5 mb-5"><span class="text-secondary">Home / Data Klasifikasi Surat / </span>Tambah Data Klasifikasi Surat</p>
    <div class="mb-3 row">
        <label for="letter_code" class="col-sm-2 col-form-label">Kode Surat </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="letter_code" name="letter_code" value="{{ old('letter_code') }} ">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="name_type" class="col-sm-2 col-form-label">Klasifikasi Surat </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name_type" name="name_type" value="{{ old('name_type') }} ">
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
</form>
@endsection