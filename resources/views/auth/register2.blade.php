@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Section: Design Block -->
        <section class="text-center">
            <!-- Background image -->
            <div class="p-5 bg-image"
                style="
                background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
                height: 300px;
                ">
            </div>
            <!-- Background image -->

            <div class="card mx-4 mx-md-5 shadow-5-strong"
                style="
                margin-top: -100px;
                background: hsla(0, 0%, 100%, 0.8);
                backdrop-filter: blur(30px);
                ">
                <div class="card-body py-5 px-md-5">

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <h2 class="fw-bold mb-5">Register</h2>
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">

                                    <div class="col-lg-6 mb-4">
                                        <div class="form-outline">
                                            <input type="number" id="nik"
                                                class="form-control @error('nik') is-invalid @enderror" name="nik"
                                                value="{{ old('nik') }}" required autocomplete="nik" autofocus>
                                            <label class="form-label" for="nik">NIK</label>

                                            @error('nik')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="name"
                                                class="form-control  @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus />
                                            <label class="form-label" for="name">Nama</label>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="email"
                                        class="form-control  @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" />
                                    <label class="form-label" for="email">Email</label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="number" id="phone"
                                        class="form-control  @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" autofocus />
                                    <label class="form-label" for="phone">No Telepon</label>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="file" id="foto_ktp"
                                        class="form-control  @error('foto_ktp') is-invalid @enderror" name="foto_ktp"
                                        value="{{ old('foto_ktp') }}" required autocomplete="foto_ktp" autofocus />
                                    <label class="form-label" for="foto_ktp">Foto KTP</label>

                                    @error('foto_ktp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password"
                                        class="form-control  @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" />
                                    <label class="form-label" for="password">Password</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" />
                                    <label class="form-label" for="password_confirm">Konfirmasi Password</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Register
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
    </div>
@endsection
