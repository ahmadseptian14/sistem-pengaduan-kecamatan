@extends('layouts.masyarakat')

@section('content')
<div>
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title" style="color: #ffffff">Silahkan Laporkan Pengaduan Anda</h2>
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
                    <div class="card" style="background-color : #0f0b8a">
                        <div class="card-body">
                           <form action="{{route('pengaduan.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label style="color: white">Judul Pengaduan</label>
                                            <input name="judul_pengaduan" cols="10" rows="5" class="form-control"></input>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="form-group">
                                            <label style="color: white">Kategori Pengaduan</label>
                                            <select name="kategori_pengaduan" id="kategori_pengaduan" class="form-control rating">                   
                                                <option value="Perizinan Proposal Bantuan Madrasah">Perizinan Proposal Bantuan Madrasah</option>
                                                <option value="Keterangan Beda Nama">Keterangan Beda Nama</option>
                                                <option value="Surat Ahli Waris">Surat Ahli Waris</option>
                                                <option value="Perizinan Keramaian Pernikahan">Perizinan Keramaian Pernikahan</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label style="color: white">Keterangan</label>
                                            <textarea name="keterangan" cols="10" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label style="color: white">Tanggal Perizinan</label>
                                            <input type="date" name="tanggal_perizinan" cols="10" rows="5" class="form-control"></input>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn px-5" style="background-color: #524EEE; color :white">
                                            Simpan
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
  </div>
@endsection