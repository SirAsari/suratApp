@extends('layouts.template')

@section('content')
<style>
    .ck.ck-content {
        height: 230px; 
    }
</style>

<form action="{{ route('letter.store') }}" method="POST" class="card p-5">
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

    <p class="fs-3">Tambah surat</p>
    <div class="mb-3 row">
        <label for="letter_perihal" class="col-sm-2 col-form-label">Perihal </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="letter_perihal" name="letter_perihal" value="{{ old('letter_perihal') }} ">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="letter_type_id" class="col-sm-2 col-form-label">Klasifikasi Surat : </label>
        <div class="col-sm-10">
            <select class="form-control" id="letter_type_id" name="letter_type_id">
                @foreach($letterTypes as $letterType)
                <option value="{{ $letterType->id }}">{{ $letterType->name_type }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <h5>Isi Surat</h5>
    <div id="editor"></div>
    <input type="hidden" name="content" id="content">
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Peserta (Ceklis jika "ya")</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gurus as $guru)
                        <tr>
                            <td>{{ $guru->name }}</td>
                            <td>
                                <input type="checkbox" name="recipients[]" value="{{ $guru->id }}">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="lampiran" class="col-sm-2 col-form-label">Lampiran (Optional)</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="lampiran" name="lampiran">
        </div>
    </div>
    <div class="mb-3 row">
    <label for="notulis_id" class="col-sm-2 col-form-label">Notulis</label>
    <div class="col-sm-10">
        <select class="form-control" id="notulis_id" name="notulis_id">
            @foreach($allUsers as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
</div>
    <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>

</form>
<script src="{{ asset('js/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                const content = editor.getData();
                document.querySelector('#content').value = content;
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endsection