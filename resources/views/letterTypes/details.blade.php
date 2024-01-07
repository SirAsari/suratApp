@extends('layouts.template')

@section('content')
    <h1 class="h3 mb-2 text-gray-800 mt-5">Detail Data Klasifikasi Surat</h1>
    <p class="fs-5 mb-5"><span class="text-secondary">Home / Data Klasifikasi Surat / </span>Detail Klasifikasi Surat</p>
    <div class="d-flex">
        <p class="fs-2">{{ $letterType->letter_code }}</p>
        <p class="fs-4 mt-2 text-secondary mx-3">{{ $letterType->name_type }}</p>
    </div>
    <hr>

    @if(Session::get('error'))
    <div class="alert alert-warning"> {{ Session::get('error') }} </div>
    @endif
    @if ($letters->count() > 0)
        @foreach ($letters as $letter)
            <div class="card mb-3">
                <div class="card-body">
                    <p class="fs-5 text-gray-600">{{ $letter->letter_perihal }}</p>
                    <p>{{ date('d-M-Y', strtotime($letter->created_at)) }}</p>
                    @php
                        $recipients = json_decode($letter->recipients);
                    @endphp
                    @if ($recipients)
                    <a href="{{ route('letterType.generatePDF', $letter['id']) }}" class="btn btn-primary">Export PDF</a>

                        <p>Recipients:</p>
                        <ol>
                            @foreach ($recipients as $recipientId)
                                @php
                                    $recipient = \App\Models\User::find($recipientId);
                                @endphp
                                <li>{{ $recipient ? $recipient->name : 'User Not Found' }}</li>
                            @endforeach
                        </ol>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <p>Tidak Ada Surat Tertaut.</p>
    @endif
@endsection
