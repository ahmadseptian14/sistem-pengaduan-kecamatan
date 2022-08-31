@extends('layouts.success')
    
@section('content')
    <!-- Page Content -->
    <div class="page-content page-success mt-5">
        <div class="section-success" data-aos="zoom-in">
          <div class="container">
            <div class="row align-items-center row-login justify-content-center">
              <div class="col-lg-6 text-center">
                <h2>
                  Pengaduan sukses di kirim
                </h2>
                <p>
                  Silahkan tunggu tanggapan dari kami <br />
                  kami akan menanggapi secepat mungkin!
                </p>
                <div>
                  <a class="btn btn-success w-50 mt-4" href="{{route('pengaduan.create')}}">
                    Kembali ke halaman input pengaduan
                  </a>
                  <a class="btn btn-signup w-50 mt-2" href="{{route('pengaduan.all')}}">
                    Halaman hasil pengaduan
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
@endsection