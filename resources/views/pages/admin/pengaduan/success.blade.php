@extends('layouts.success')
    
@section('content')
    <!-- Page Content -->
    <div class="page-content page-success mt-5">
        <div class="section-success" data-aos="zoom-in">
          <div class="container">
            <div class="row align-items-center row-login justify-content-center">
              <div class="col-lg-6 text-center">
                <h2>
                  Pengaduan berhasil ditanggapi
                </h2>
                <div>
                  <a class="btn btn-success w-50 mt-4" href="{{route('sms.create', $pengaduan->id)}}">
                    Kirim pesan kepada masyarakat
                  </a>
                  <a class="btn btn-signup w-50 mt-2" href="{{route('pengaduan.index')}}">
                    Halaman data pengaduan
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
@endsection