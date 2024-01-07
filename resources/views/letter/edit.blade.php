@extends('layouts.template')

@section('content')
<form action="{{ route('letter.update', $letter->id) }}" method="POST" enctype="multipart/form-data" class="card p-5">

        @csrf
        @method('PATCH')

        <div class="mb-3 row">
            <label for="letter_perihal" class="col-sm-2 col-form-label">Perihal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="letter_perihal" name="letter_perihal" value="{{ $letter->letter_perihal }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="letter_type_id" class="col-sm-2 col-form-label">Klasifikasi Surat</label>
            <div class="col-sm-10">
                <select class="form-control" id="letter_type_id" name="letter_type_id">
                    @foreach($letter as $type)
                        <option value="{{ $type->id }}" {{ $letter->letter_type_id == $type->id ? 'selected' : '' }}>{{ $type->name_type }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Other form fields for editing -->
        
        <!-- Recipients - Assuming recipients are checkboxes -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Recipients</label>
            <div class="col-sm-10">
                @foreach($allUsers as $user)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="recipients[]" value="{{ $user->id }}" {{ in_array($user->id, json_decode($letter->recipients, true) ?? []) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $user->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Attachment -->
        <div class="mb-3 row">
            <label for="lampiran" class="col-sm-2 col-form-label">Lampiran (Optional)</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="lampiran" name="lampiran">
            </div>
        </div>

        <!-- Notulis -->
        <div class="mb-3 row">
            <label for="notulis_id" class="col-sm-2 col-form-label">Notulis</label>
            <div class="col-sm-10">
                <select class="form-control" id="notulis_id" name="notulis_id">
                    @foreach($allUsers as $user)
                        <option value="{{ $user->id }}" {{ $letter->notulis_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Data</button>
    </form>
@endsection
