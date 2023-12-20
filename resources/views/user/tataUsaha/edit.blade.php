@extends('layouts.template')

@section('content')
<form action="{{ route('user.tataUsaha.update', $User['id']) }}" method="POST" class="card p-5">
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
        <label for="name" class="col-sm-2 col-form-label">Nama : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $User['name']}} ">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{ $User['email']}} ">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Password : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="password" name="password">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Role : </label>
        <div class="col-sm-10">
            <select class="form-select" id="role" name="role">
                <option selected disabled hidden>Pilih</option>
                <option value="staff" {{ $User['role'] == 'staff' ? 'selected' : '' }}>staff</option>
                <option value="guru" {{ $User['role'] == 'guru' ? 'selected' : '' }}>guru</option>
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
</form>
@endsection