@extends('layouts.masyarakat')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title" style="color: white">Pengaduan</h2>
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
                                                <th>Tanggal</th>
                                                <th>Judul Pengaduan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pengaduans as $pengaduan)
                                                <tr>
                                                    <td>{{ $pengaduan->created_at->format('d-m-Y - H:i:s') }}</td>
                                                    <td>{{ $pengaduan->judul_pengaduan }}</td>
                                                    @if (empty($pengaduan->tanggapan->status_pengaduan))
                                                        <td>Belum di Respon</td>
                                                    @else
                                                        <td>{{ $pengaduan->tanggapan->status_pengaduan }}</td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('pengaduan.detail', $pengaduan->id) }}"
                                                            class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                style="margin-right: 5px"></i>Detail Pengaduan</a>
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
        $(document).ready(function() {
            $('#table1').DataTable();
        });
    </script>
@endpush
