@extends('layouts.admin')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Petugas</h2>
            <p class="dashboard-subtitle">
                Daftar Petugas
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('petugas.create') }}" class="btn btn-primary mb-3"> + Tambah Petugas
                                Baru</a>
                            <div>
                                <table
                                    class="table table-hover scroll-horizontal-vertical w-100 table-bordered table-striped"
                                    id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>No.Telepon</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($petugass as $petugas)
                                            <tr>
                                                <td>{{$petugas->name}}</td>
                                                <td>{{$petugas->nik}}</td>
                                                <td>{{$petugas->phone}}</td>
                                                <td>{{$petugas->email}}</td>
                                                <td>{{$petugas->roles}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak Ada petugas</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-scripts')
    <script>
        $(document).ready( function () {
            $('#table1').DataTable();
        } );
    </script>
@endpush
