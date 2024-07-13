@extends('layouts.app')

@section('title', 'Kriteria')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Kriteria</h1>
    <a href="{{ route('kriteria.create') }}" class="btn btn-primary" style="background-color: #526D82">add Kriteria</a>
</div>
<hr />
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif
<div class="table-responsive">
    <table class="table table-hover" id="kriteriaTable">
        <thead class="table text-white" style="background-color: #526D82">
            <tr>
                <th>Kode Kriteria</th>
                <th>Nama</th>
                <th>Bobot</th>
                <th>Tipe</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($kriteria->count() > 0)
                @foreach($kriteria as $rs)
                    <tr>
                        <td class="align-middle">{{ $rs->code_kriteria }}</td>
                        <td class="align-middle">{{ $rs->kriteria }}</td>
                        <td class="align-middle">{{ $rs->weight }}</td>
                        <td class="align-middle btn text-white" style="background-color: #059212">{{ $rs->type }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="#" type="button" class="btn text-white" style="background-color: rgb(92, 105, 188)">Detail</a>
                                <a href="{{ route('kriteria.edit', $rs->id) }}" type="button" class="btn text-white" style="background-color: mediumslateblue">Edit</a>
                                <form action="{{ route('kriteria.destroy', $rs->id) }}" method="POST" type="button" class="btn p-0" style="background-color: burlywood" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Kriteria not found</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kriteriaTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "columnDefs": [
                { "orderable": false, "targets": -1 } // disable ordering on the action column
            ],
            "language": {
                "paginate": {
                    "previous": "Prev",
                    "next": "Next"
                },
                "lengthMenu": "Show _MENU_ entries",
                "zeroRecords": "No matching records found",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries available",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "search": "Search:"
            }
        });
    });
</script>
@endpush

@endsection
