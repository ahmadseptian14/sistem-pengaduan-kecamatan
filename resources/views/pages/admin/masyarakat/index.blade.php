@extends('layouts.admin')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Masyarakat</h2>
            <p class="dashboard-subtitle">
                Daftar masyarakat
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <table
                                    class="table table-hover scroll-horizontal-vertical w-100 table-bordered table-striped"
                                    id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>No.Telepon</th>
                                            <th>Email</th>
                                            <th>Foto KTP</th>
                                            <th>Status Verifikasi</th>
                                            <th>Verifikasi Akun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($masyarakats as $masyarakat)
                                            <tr>
                                                <td>{{$masyarakat->name}}</td>
                                                <td>{{$masyarakat->nik}}</td>
                                                <td>{{$masyarakat->phone}}</td>
                                                <td>{{$masyarakat->email}}</td>

                                                <td>
                                                    <a href="{{asset('storage/'. $masyarakat->foto_ktp)}}" target="_blank">
                                                        <img src="{{Storage::url($masyarakat->foto_ktp)}}" width="50" height="50" class="rounded-square">
                                                    </a>
                                                </td>
                                                <td>{{$masyarakat->verifikasi}}</td>
                                                <td>
                                                    @if ($masyarakat->verifikasi == 'Sudah di Verifikasi')
                                                    <form action="{{route('masyarakat.verifikasi')}}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button class="btn btn-success mt-2 btn-sm">
                                                        <i class="fa fa-check"></i>
                                                        </button>
                                                    </form>
                                                        
                                                    @else
                                                    <form action="{{route('masyarakat.verifikasi')}}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button class="btn btn-danger mt-2 btn-sm">
                                                        <i class="fa fa-check"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                                   
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak Ada masyarakat</td>
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
            $('#dataTable').DataTable();
        } );
    </script>
@endpush
