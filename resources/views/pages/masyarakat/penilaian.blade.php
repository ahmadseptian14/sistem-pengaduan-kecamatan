@extends('layouts.masyarakat')

@section('content')
    <div>
        <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
                <div class="dashboard-heading">
                    <h2 class="dashboard-title" style="color: #ffffff">Silahkan Beri Penilaian Anda Terhadap Kinerja Kecamatan
                    </h2>
                </div>
                <div class="dashboard-content">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card" style="background-color : #0f0b81">
                                <div class="card-body">
                                    <form action="{{ route('penilaian.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <input type="text" name="pengaduans_id" class="form-control" hidden value="{{$pengaduan->id}}">
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label style="color: white">Berikan Penilaian</label>
                                                    <textarea name="keterangan" cols="10" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label style="color: white">Rating</label>
                                                    <select name="rating" id="" class="form-control rating">
                                                        <option value="Sangat Baik">Sangat Baik</option>
                                                        <option value="Baik">Baik</option>
                                                        <option value="Cukup">Cukup</option>
                                                        <option value="Kurang">Kurang</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col text-right">
                                                <button type="submit" class="btn px-5"
                                                    style="background-color: #524EEE; color :white">
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

    @push('addon-scripts')
        <script>
            $(document).ready(function() {
                $('.rating').select2();
            });
        </script>
    @endpush
