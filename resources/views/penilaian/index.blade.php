@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Penilaian') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col text-right">
            <a class="btn btn-primary" href="{{ route('penilaian.create') }}">Create Penilaian</a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="penilaianTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Alternatif</th>
                            <th>Nama Alternatif</th>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria->kriteria }}</th>
                            @endforeach
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($alternatifs as $alternatif)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $alternatif->code_alternatif }}</td>
                                <td>{{ $alternatif->nama }}</td>
                                @foreach ($kriterias as $kriteria)
                                    @php
                                        $penilaian = $penilaians->where('alternatif_id', $alternatif->id)->where('kriteria_id', $kriteria->id)->first();
                                    @endphp
                                    <td>{{ $penilaian ? $penilaian->nilai : '-' }}</td>
                                @endforeach
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('penilaian.edit', $alternatif->id) }}">Edit</a>
                                    <form action="{{ route('penilaian.destroy', $alternatif->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#penilaianTable').DataTable();
        });
    </script>
@endpush

@push('styles')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
