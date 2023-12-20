@extends('layouts.template')

@section('content')
<form action="{{ route('letterType.update', $letterTypes['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)    
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

    <div class="mb-3 row">
        <label for="name_type" class="col-sm-2 col-form-label">Nama Klasifikasi : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name_type" name="name_type" value="{{ $letterTypes['name_type']}} ">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="letter_code" class="col-sm-2 col-form-label">Kode Klasifikasi </label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="letter_code" name="letter_code" value="{{ explode('-', $letterTypes['letter_code'])[0] }} ">
        <input type="hidden" name="full_letter_code" value="{{ $letterTypes['letter_code'] }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>
@endsection