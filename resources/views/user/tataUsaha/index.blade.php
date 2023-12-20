@extends('layouts.template')

@section('content')

@if(Session::get('success'))
    <div class="alert alert-success"> {{ Session::get('success') }} </div>
@endif
@if(Session::get('deleted'))
    <div class="alert alert-warning"> {{ Session::get('deleted') }} </div>
@endif

<h1 class="h3 mb-5 text-gray-800 mt-5">Data Tata Usaha</h1>
<a href="{{ route('user.tataUsaha.create') }}"><button class="btn btn-success mb-4">Tambah Data</button></a>
<div class="d-flex justify-content-start mb-3">
    <form method="GET" action="{{ route('user.tataUsaha.index') }}" class="d-flex">
        <input type="text" name="search" placeholder="Search by name or email" value="{{ Request::get('search') }}" class="form-control me-2">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
<div class="d-flex justify-content-start mb-3">
    <form method="GET" action="{{ route('user.tataUsaha.index') }}">
        <label for="paginationSelect" class="me-2">Items per page:</label>
        <select name="pagination" id="paginationSelect" onchange="this.form.submit()">
            <option value="5" {{ Request::get('pagination') == '5' ? 'selected' : '' }}>5</option>
            <option value="10" {{ Request::get('pagination') == '10' ? 'selected' : '' }}>10</option>
            <option value="15" {{ Request::get('pagination') == '15' ? 'selected' : '' }}>15</option>
        </select>
    </form>
</div>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = ($Users->currentPage() - 1) * $Users->perPage() + 1; @endphp
        @foreach ($Users as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['email'] }}</td>
            <td>{{ $item['role'] }}</td>
            <td class="d-flex justify-content-center">
                <a href="{{ route('user.tataUsaha.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>

                <!-- Modal trigger button -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $item['id'] }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="confirmDelete{{ $item['id'] }}" tabindex="-1" aria-labelledby="confirmDeleteLabel{{ $item['id'] }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteLabel{{ $item['id'] }}">Konfirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Anda yakin ingin melanjutkan menghapus data ini?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('userDelete', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Ya</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    @if ($Users->count())
        {{ $Users->links() }}
    @endif
</div>

<style>
    svg.h-5.w-5 {
        width: 60px;
        height: 60px;
    }
</style>
@endsection
