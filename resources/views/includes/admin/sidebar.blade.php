 <!-- Sidebar -->
 <div class="sidebar">
  
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('dashboard.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li> 
        <li class="nav-item">
          <a href="{{route('pengaduan.index')}}" class="nav-link">
            <i class=" nav-icon fa fa-list-alt" aria-hidden="true"></i>
            <p>
              Pengaduan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('cetak.form')}}" class="nav-link">
            <i class=" nav-icon fa fa-list-alt" aria-hidden="true"></i>
            <p>
              Export Laporan Pengaduan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('penilaian.index')}}" class="nav-link">
            <i class=" nav-icon fa fa-list-alt" aria-hidden="true"></i>
            <p>
              Penilaian
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('petugas.index')}}" class="nav-link">
            <i class=" nav-icon fa fa-user-alt" aria-hidden="true"></i>
            <p>
              Petugas
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('masyarakat.index')}}" class="nav-link">
            <i class=" nav-icon fa fa-user-alt" aria-hidden="true"></i>
            <p>
              Masyarakat
            </p>
          </a>
        </li>
        
       
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->