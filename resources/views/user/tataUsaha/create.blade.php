@extends('layouts.template')

@section('content')
<form action="{{ route('user.tataUsaha.store') }}" method="POST" class="card p-5">
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

    <p class="fs-3">Tambah data tata usaha</p>
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }} ">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }} ">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Role : </label>
        <div class="col-sm-10">
            <select class="form-select" id="role" name="role">
                <option selected disabled hidden>Pilih</option>
                <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>staff</option>
                <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>guru</option>
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
</form>
@endsection