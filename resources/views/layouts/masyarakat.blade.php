<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Layanan Pengaduan</title>
      @include('includes.masyarakat.style')
    </head>
    <body>
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: #141432">
       
    <div class="container-xxl mx-auto p-0  position-relative header-2-3" style="font-family: 'Poppins', sans-serif;">
      @include('includes.masyarakat.navbar')
     @yield('content')
    </div>

  </section>
  
  <section class="h-100 w-100" style="box-sizing: border-box; background-color: #141432">
   
   @include('includes.masyarakat.tatacara')
  </section>
  
  <section class="h-100 w-100" style="box-sizing: border-box; background-color: #141432">
		
	@include('includes.masyarakat.footer')
	</section> 
    @include('sweetalert::alert')
    @include('includes.masyarakat.scripts')
    @stack('addon-scripts')
    </body>
  </html>