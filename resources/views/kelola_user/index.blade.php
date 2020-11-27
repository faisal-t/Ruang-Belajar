@extends('layouts.master')

@section('header')
    {{$title}}
@endsection

@section('body_admin')
<table id="table" class="table table-bordered">
<thead>
    <tr>
        <th>No.</th>
        <th>ID Member</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jenis Kelamin</th>
        <th>Aktivasi</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach ($data as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->id }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->email }}</td>
            <td>{{ $d->jenis_kelamin }}</td>
            <td>{{ $d->aktivasi }}</td>
            <td>
                @if ($d->aktivasi == null)
                <form action="{{ route('admin.aktivasi', $d->id) }}" class="d-inline-block" method="POST"">
                    @method('put')
                    @csrf
                    
                    <button type="submit" class="btn btn-outline-primary">Aktivasi</button>
                </form> 
                @endif
                
            </td>
        </tr>
    @endforeach
</tbody>
</table>
@endsection

@section('js')
<script type="text/javascript">
    $("#table").DataTable();
</script>
@endsection