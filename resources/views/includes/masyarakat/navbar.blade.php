<nav class="navbar navbar-expand-lg navbar-dark">
    <a href="#">
      <img style="margin-right:0.75rem"
        src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-3.png" alt="">
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-item">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="modal-item modal fade" id="targetModal-item" tabindex="-1" role="dialog"
      aria-labelledby="targetModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content border-0" style="background-color: #141432;">
          <div class="modal-header border-0" style="padding:	2rem; padding-bottom: 0;">
            <a class="modal-title" id="targetModalLabel">
              <img style="margin-top:0.5rem"
                src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-3.png"
                alt="">
            </a>
            <button type="button" class="close btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body" style="padding:	2rem; padding-top: 0; padding-bottom: 0;">
            <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="#" style="color: #E7E7E8;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Tata Cara</a>
              </li>
            </ul>
          </div>
          <div class="modal-footer border-0 gap-3" style="padding:	2rem; padding-top: 0.75rem">
          </div>
        </div>
      </div>
    </div>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo">
      <ul class="navbar-nav me-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('pengaduan.all')}}">Pengaduan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('penilaian.create')}}">Beri Penilaian</a>
        </li>
      </ul>
      <div class="gap-3">
        {{-- <a href="#" class="btn btn-default btn-no-fill">{{Auth::user()->name}}</a> --}}
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hi, {{Auth::user()->name}}
              </a>
              <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"">Logout</a>
        
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
               
              </ul>
            </li>
          </ul>
        </div>
      </div>
  </nav>
