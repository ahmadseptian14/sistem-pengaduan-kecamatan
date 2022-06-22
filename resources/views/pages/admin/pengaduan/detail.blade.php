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
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h4>Nama : {{$pengaduan->name}}</h4>
                                <h4>NIK : {{$pengaduan->user_nik}}</h4>
                                <h4>No.Telepon : {{$pengaduan->user->phone}}</h4>
                                <h4>Tanggal : {{ $pengaduan->created_at->format('l, d F Y - H:i:s') }}</h4>
                                <h4>Status : 
                                    @if($pengaduan->status =='Belum di Proses')
                                    <span class="badge badge-pill badge-danger">{{$pengaduan->status}}</span>

                                    @elseif ($pengaduan->status =='Sedang di Proses')
                                    <span class="badge badge-pill badge-primary">{{$pengaduan->status}}</span>
                                    @else

                                    <span
                                    <span class="badge badge-pill badge-success">{{$pengaduan->status}}</span>
                                    @endif
                                </h4>
                            </div>
                          
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h4 class="text-center">Keterangan</h4>
                                <p>{{$pengaduan->description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h4 class="text-center">Tanggapan</h4>
                                @if (empty($tanggapan->tanggapan))
                                Belum ada tanggapan
                                @else
                                {{ $tanggapan   ->tanggapan}}
                                @endif
                            </div>
                            @empty
                            <h2>Tidak Ada Pengaduan</h2>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            <a href="{{route('tanggapan.show', $pengaduan->id)}}" class="btn btn-primary btn-lg active">Berikan Tanggapan</a>
        </div>
    </div>
</div>
@endsection

{{-- @push('addon-scripts')
    <script>
        $(document).ready( function () {
            $('#table1').DataTable();
        } );
    </script>
@endpush --}}
