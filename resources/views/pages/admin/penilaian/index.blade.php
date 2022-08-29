@extends('layouts.admin')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Penilaian</h2>
            <p class="dashboard-subtitle">
                Daftar Penilaian
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <a href="{{ route('laporan.cetak') }}" class="btn btn-primary mb-3">Export Semua Laporan Pengaduan</a> --}}
                            <div>
                                <table
                                    class="table table-hover scroll-horizontal-vertical w-100 table-bordered table-striped"
                                    id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Penilaian</th>
                                            <th>Rating</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($penilaians as $penilaians)
                                            <tr>
                                                <td>{{ $penilaians->user->name }}</td>
                                                <td>{{ $penilaians->created_at->format('d F Y - H:i:s') }}</td>
                                               <td>{{$penilaians->description}}</td>
                                               <td>{{$penilaians->rating}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak Ada Pengaduan</td>
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

{{-- @push('addon-scripts')
    <script>
        $(document).ready( function () {
            $('#table1').DataTable();
        } );
    </script>
@endpush --}}
