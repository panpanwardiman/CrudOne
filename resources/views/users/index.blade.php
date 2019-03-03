@extends('layouts.app')

@section('content')
<div class="clearfix">
    <h3 class="float-left">Users</h3>
    <a href="{{ route('user.create') }}" class="btn btn-primary float-right modal-show" title="Add new user">Add new user</a>
</div>
<hr>
<table class="table table-bordered table-striped" id="datatables" style="width:100%">
    <thead>
        <tr>
            <!-- <th>No.</th> -->
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Level</th>
            <th></th>
        </tr>
        <tbody>

        </tbody>
    </thead>
</table>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#datatables').DataTable({
        responsive: true,
        // processing: true,
        serverSide: true,
        ajax: "{{ route('user.tables') }}",
        columns: [
            // { data: 'id', name: 'id', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'gender', name: 'gender' },
            { data: 'level', name: 'level' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    })
</script>
@endpush