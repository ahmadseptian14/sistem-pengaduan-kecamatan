@extends('layouts.admin')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">masyarakat</h2>
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
                                    id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>No.Telepon</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
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
                                                    <div class="btn-group">
                                                        <div class="dropdown">
                                                            <button class="btn btn-primay dropdown-toggle mr-1 mb-1"
                                                                type="button" data-toggle="dropdown">
                                                                Aksi
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a href="{{ route('masyarakat.edit', $masyarakat->id) }}"
                                                                    class="dropdown-item">
                                                                    Edit
                                                                </a>
                                                                <form
                                                                    action="{{ route('masyarakat.destroy', $masyarakat->id) }}"
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
            $('#table1').DataTable();
        } );
    </script>
@endpush
