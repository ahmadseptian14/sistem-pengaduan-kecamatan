@extends('layouts.admin')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Export Laporan Pengaduan</h2>
    </div>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>   
            @endif
            <div class="card">
                <div class="container p-3">
                    <form action="{{route('cetak.laporan')}}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input type="date" name="end_date" id="end_date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit"  name="cari" class="btn btn-secondary btn-block">Cetak</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection