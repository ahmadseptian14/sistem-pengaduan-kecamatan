 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
       <!-- Nav Item - Alerts -->
       <li class="nav-item dropdown no-arrow ">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          @php
               $pengaduan = App\Models\Pengaduan::where('status', 'Belum di Proses')->count()
          @endphp
          <!-- Counter - Alerts -->
          @if ($pengaduan)
          <span class="badge badge-danger badge-counter">{{$pengaduan}}</span>
          @endif
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">
            Pemberitahuan
          </h6>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
              <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
              </div>
            </div>
            @php
                $pengaduans = App\Models\Pengaduan::where('status', 'Belum di Proses')->get()
            @endphp
            <div>
              @forelse ($pengaduans as $pengaduan)
              <div class="small text-gray-500">{{$pengaduan->created_at}}</div>
              <span class="font-weight-bold">{{$pengaduan->nama}} baru saja mengirim pengaduan</span>
              @empty
              <span class="font-weight-bold">Tidak ada pemberitahuan</span>
              @endforelse
            
            </div>
          </a>
        </div>
      </li>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
          {{Auth::user()->name}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="{{url('/')}}">Halaman Utama</a>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
          </form>
        </div>
      </div>
      
    </ul>
   
  </nav>
  <!-- /.navbar -->