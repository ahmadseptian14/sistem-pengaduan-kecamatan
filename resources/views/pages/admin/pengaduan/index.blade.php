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
                            <h3 class="mb-3 mt-3 mr-3 ml-3">Cari Berdasarkan Tanggal</h3>
                            <div class="container p-3">
                                <form action="" method="GET">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Dari Tanggal</label>
                                                <input type="date" name="start_date" id="start_date"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Sampai Tanggal</label>
                                                <input type="date" name="end_date" id="end_date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="cari" class="btn btn-secondary btn-block"><i
                                            class="fa fa-search"></i></button>

                                </form>
                            </div>
                        </div>
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
                                                <th>Kategori Pengaduan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pengaduans as $pengaduan)
                                                <tr>
                                                    <td>{{ $pengaduan->nama }}</td>
                                                    <td>{{ $pengaduan->created_at->format('d-m-Y - H:i:s') }}</td>
                                                    <td>{{ $pengaduan->kategori_pengaduan }}</td>
                                                    @if (empty($pengaduan->tanggapan->status_pengaduan))
                                                        <td>Belum di Respon</td>
                                                    @else
                                                        <td>{{ $pengaduan->tanggapan->status_pengaduan }}</td>
                                                    @endif
                                                    <td>
                                                        {{-- <div class="btn-group">
                                                            <div class="dropdown">
                                                                <button class="btn btn-primay dropdown-toggle mr-1 mb-1"
                                                                    type="button" data-toggle="dropdown">
                                                                    Lihat
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
                                                        </div> --}}
                                                        <a href="{{ route('pengaduan.show', $pengaduan->id) }}"
                                                            class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                style="margin-right: 5px"></i>Detail Pengaduan</a>
                                                        <a href="{{ route('sms.create', $pengaduan->id) }}"
                                                            class="btn btn-info btn-sm"><i class="fa fa-message"
                                                                style="margin-right: 5px"></i>Kirim Pesan</a>

                                                        <form action="{{ route('pengaduan.destroy', $pengaduan->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-sm mt-2">
                                                                Hapus
                                                            </button>
                                                        </form>
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
            $('#table1').DataTable({
                "order": [
                    [3, "desc"]
                ]
            });
        });
    </script>
@endpush

{{-- @push('addon-scripts')
    <script>
        $(document).ready( function () {
            $('#table1').DataTable();
        } );
    </script>
@endpush --}}
