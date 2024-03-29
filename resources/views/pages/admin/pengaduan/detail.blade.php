@extends('layouts.admin')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Detail Pengaduan</h2>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @forelse ($pengaduans->details as $pengaduan)
                            <div class="card mb-3">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h4>Nama : {{ $pengaduan->nama }}</h4>
                                            <h4>NIK : {{ $pengaduan->user_nik }}</h4>
                                            <h4>No.Telepon : {{ $pengaduan->user->phone }}</h4>
                                            <h4>Tanggal : {{ $pengaduan->created_at->format('d-m-Y - H:i:s') }}</h4>
                                            <h4></h4>
                                            <h4>Kategori Pengaduan : {{ $pengaduan->kategori_pengaduan }}</h4>
                                            <h4>Tanggal Perizinan : {{$pengaduan->tanggal_perizinan}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div>
                                    <h4 class="text-center mb-4">Keterangan Pengaduan</h4>
                                    <p>{{ $pengaduan->keterangan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div>
                                    <h4 class="text-center">Status Pengaduan</h4>
                                    <div class="list-group">
                                        @forelse ($tanggapans as $tanggapan)
                                            <div class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    @if (empty($tanggapan->status_pengaduan))
                                                        <h5 class="mb-1">Belum di Respon</h5>
                                                    @else
                                                        <h5 class="mb-1">{{ $tanggapan->status_pengaduan }}</h5>
                                                    @endif
                                                    <small>{{ $tanggapan->created_at }}</small>
                                                </div>
                                                @if (empty($tanggapan->tanggapan))
                                                    <p class="mb-1">Belum ada tanggapan</p>
                                                @else
                                                    <p class="mb-1">{{ $tanggapan->tanggapan }}</p>
                                                @endif
                                            </div>
                                        @empty
                                            <h4>Belum di Proses dan Tidak ada Tanggapan</h4>
                                        @endforelse
                                    </div>
                                </div>
                            @empty
                                <h2>Tidak Ada Pengaduan</h2>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="text-center">Penilaian</h4>
                        @forelse ($penilaians as $penilaian)
                            <div>
                                <p>Komentar : {{ $penilaian->keterangan }}</p>
                                <p>Rating : {{ $penilaian->rating }}</p>
                            </div>
                        @empty
                            <p>Belum ada Penilaian</p>
                        @endforelse

                    </div>
                </div>
            </div>
            <a href="{{ route('tanggapan.show', $pengaduan->id) }}" class="btn btn-primary btn-lg active mb-5">Berikan
                Tanggapan</a>
        </div>
    </div>
@endsection
