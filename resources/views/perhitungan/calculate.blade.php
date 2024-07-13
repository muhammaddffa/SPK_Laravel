@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Perhitungan TOPSIS') }}</h1>

    <!-- Matriks Normalisasi -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Matriks Normalisasi</h5>
            <div class="table-responsive">
                <table id="normMatrixTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($criteria as $kriteria)
                                <th>{{ $kriteria->kriteria}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($normMatrix as $altIndex => $nilai)
                            <tr>
                                <td>{{ $alternatives[$altIndex]->nama }}</td>
                                @foreach ($nilai as $val)
                                    <td>{{ number_format($val, 4) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Matriks Normalisasi Terbobot -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Matriks Normalisasi Terbobot</h5>
            <div class="table-responsive">
                <table id="weightedNormTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach ($criteria as $kriteria)
                                <th>{{ $kriteria->kriteria}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($weightedNorm as $altIndex => $nilai)
                            <tr>
                                <td>{{ $alternatives[$altIndex]->nama }}</td>
                                @foreach ($nilai as $val)
                                    <td>{{ number_format($val, 4) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Solusi Ideal Positif dan Negatif -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Solusi Ideal Positif</h5>
            <div class="table-responsive">
                <table id="idealPositiveTable" class="table table-bordered">
                    <thead>
                        <tr>
                            @foreach ($criteria as $kriteria)
                                <th>{{ $kriteria->kriteria}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($idealPositive as $nilai)
                                <td>{{ number_format($nilai, 4) }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Solusi Ideal Negatif</h5>
            <div class="table-responsive">
                <table id="idealNegativeTable" class="table table-bordered">
                    <thead>
                        <tr>
                            @foreach ($criteria as $kriteria)
                                <th>{{ $kriteria->kriteria}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($idealNegative as $nilai)
                                <td>{{ number_format($nilai, 4) }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Jarak Solusi Ideal Positif -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Jarak Solusi Ideal Positif</h5>
            <div class="table-responsive">
                <table id="solutionPositiveTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <th>Jarak Positif</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solutionPositive as $altIndex => $nilai)
                            <tr>
                                <td>{{ $alternatives[$altIndex]->nama }}</td>
                                <td>{{ number_format($nilai, 4) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Jarak Solusi Ideal Negatif -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Jarak Solusi Ideal Negatif</h5>
            <div class="table-responsive">
                <table id="solutionNegativeTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <th>Jarak Negatif</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solutionNegative as $altIndex => $nilai)
                            <tr>
                                <td>{{ $alternatives[$altIndex]->nama }}</td>
                                <td>{{ number_format($nilai, 4) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Nilai Preferensi dan Perankingan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Nilai Preferensi dan Perankingan</h5>
            <div class="table-responsive">
                <table id="preferenceTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Peringkat</th>
                            <th>Alternatif</th>
                            <th>Nilai Preferensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $rank = 1; 
                            $sortedPreferences = collect($preferenceValue)->sortDesc()->toArray();
                        @endphp
                        @foreach ($sortedPreferences as $altIndex => $nilai)
                            <tr>
                                <td>{{ $rank++ }}</td>
                                <td>{{ $alternatives[$altIndex]->nama }}</td>
                                <td>{{ number_format($nilai, 4) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('scripts')
        <!-- DataTables JavaScript -->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#normMatrixTable').DataTable();
                $('#weightedNormTable').DataTable();
                $('#idealPositiveTable').DataTable();
                $('#idealNegativeTable').DataTable();
                $('#solutionPositiveTable').DataTable();
                $('#solutionNegativeTable').DataTable();
                $('#preferenceTable').DataTable();
            });
        </script>
    @endpush
    
    @push('styles')
        <!-- DataTables CSS -->
        <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush
@endsection

