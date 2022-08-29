 <!-- Sidebar -->
 <div class="sidebar">

     <!-- Sidebar Menu -->
     <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             @if (Auth::user()->roles == 'ADMIN')

             <li class="nav-item">
                <a href="{{ route('dashboard.index') }}" class="nav-link">
                    <i class=" nav-icon fa fa-list-alt" aria-hidden="true"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            
             <li class="nav-item">
                <a href="{{ route('pengaduan.index') }}" class="nav-link">
                    <i class=" nav-icon fa fa-list-alt" aria-hidden="true"></i>
                    <p>
                        Kelola Data Pengaduan dan Penilaian
                    </p>
                </a>
            </li>
                
                 {{-- <li class="nav-item">
                     <a href="{{ route('cetak.form') }}" class="nav-link">
                         <i class=" nav-icon fa fa-list-alt" aria-hidden="true"></i>
                         <p>
                             Kelola Laporan Pengaduan
                         </p>
                     </a>
                 </li> --}}

                 <li class="nav-item">
                    <a href="{{ route('masyarakat.index') }}" class="nav-link">
                        <i class=" nav-icon fa fa-user-alt" aria-hidden="true"></i>
                        @php
                           $masyarakat = App\Models\User::where('verifikasi', 'Belum di Verifikasi')->count()
                        @endphp
                        @if ($masyarakat)
                        <p>
                            <span class="badge badge-pill badge-danger">{{$masyarakat}}</span> Kelola Data Masyarakat 
                        </p>
                        @else
                            <p>Kelola Data Masyarakat</p>
                        @endif
                       
                    </a>
                </li>
                
                 {{-- <li class="nav-item">
                     <a href="{{ route('penilaian.index') }}" class="nav-link">
                         <i class=" nav-icon fa fa-list-alt" aria-hidden="true"></i>
                         <p>
                             Lihat Data Penilaian
                         </p>
                     </a>
                 </li> --}}
             @endif

             @if (Auth::user()->roles == 'ADMIN' || 'CAMAT')
                 <li class="nav-item">
                     <a href="{{ route('grafik.index') }}" class="nav-link">
                         <i class=" nav-icon fa fa-list-alt" aria-hidden="true"></i>
                         <p>
                             Lihat Grafik Penilaian
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                    <a href="{{ route('grafik.pengaduan') }}" class="nav-link">
                        <i class=" nav-icon fa fa-list-alt" aria-hidden="true"></i>
                        <p>
                            Lihat Grafik Status Pengaduan
                        </p>
                    </a>
                </li>
             @endif

             {{-- @if (Auth::user()->roles == 'CAMAT')
             <li class="nav-item">
                 <a href="{{ route('grafik.index') }}" class="nav-link">
                     <i class=" nav-icon fa fa-user-alt" aria-hidden="true"></i>
                     <p>
                         Lihat Grafik Penilaian
                     </p>
                 </a>
             </li>
             <li class="nav-item">
                <a href="{{ route('grafik.pengaduan') }}" class="nav-link">
                    <i class=" nav-icon fa fa-user-alt" aria-hidden="true"></i>
                    <p>
                        Lihat Grafik Status Pengaduan
                    </p>
                </a>
            </li>
         @endif --}}
         
         </ul>
     </nav>
     <!-- /.sidebar-menu -->
 </div>
 <!-- /.sidebar -->
