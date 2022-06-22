@extends('layouts.admin')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Pengaduan</h2>
            <p class="dashboard-subtitle">
                Daftar Pengaduan
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('laporan.cetak') }}" class="btn btn-primary mb-3">Export Semua Laporan Pengaduan</a>
                            <div>
                                <table
                                    class="table table-hover scroll-horizontal-vertical w-100 table-bordered table-striped"
                                    id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pengaduans as $pengaduan)
                                            <tr>
                                                <td>{{ $pengaduan->name }}</td>
                                                <td>{{ $pengaduan->created_at->format('l, d F Y - H:i:s') }}</td>
                                                <td>{{$pengaduan->status}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <div class="dropdown">
                                                            <button class="btn btn-primay dropdown-toggle mr-1 mb-1"
                                                                type="button" data-toggle="dropdown">
                                                                Aksi
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a href="{{ route('pengaduan.show', $pengaduan->id) }}"
                                                                    class="dropdown-item">
                                                                    Lihat
                                                                </a>
                                                                <form
                                                                    action="{{ route('pengaduan.destroy', $pengaduan->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        class="dropdown-item text-danger">
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
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
            $('#table1').DataTable({
                "order":[
                    [3, "desc"]
                ]
            });
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
