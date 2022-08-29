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
                        <div class="col-lg-8">
                            <h2 class="fw-bold mb-5">Login</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                    <label class="form-label" for="email">Email</label>
                                </div>

                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                    <label class="form-label" for="password">Password</label>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    Login
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
