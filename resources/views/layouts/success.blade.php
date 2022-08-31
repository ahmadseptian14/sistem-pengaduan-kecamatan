<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Sukses Mengirim Pengaduan</title>

    {{-- Style --}}
    @include('includes.masyarakat.style')
    @stack('addon-styles')
  </head>

  <body>
   

    <!-- Page Content -->
    @yield('content')

    {{-- footer --}}
    @include('includes.masyarakat.footer')

   {{-- script --}}
   @include('includes.masyarakat.scripts')
   @stack('addon-scripts')
  </body>
</html>