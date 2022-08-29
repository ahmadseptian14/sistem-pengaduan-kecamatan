@extends('layouts.admin')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Tanggapan</h2>
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
                    <div class="card-body">
                       <form action="{{route('tanggapan.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }} ">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tanggapan</label>
                                        <input type="text" name="tanggapan" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status_pengaduan" id="status_pengaduan" class="form-control select2" multiple="multiple">                   
                                            <option value="Belum di Proses">Belum di Proses</option>
                                            <option value="Sedang di Proses">Sedang di Proses</option>
                                            <option value="Selesai">Selesai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-success px-5">
                                        Tanggapi
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection