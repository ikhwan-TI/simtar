 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ url('/') }}" class="brand-link">
         <img src="{{ asset('main-assets/dist/img/logo-uho.png') }}" alt="Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">SIMTAR</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('main-assets/dist/img/avatar5.png') }}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ auth()->user()->nama }}</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>

                 @can('admin')
                     <li class="nav-item">
                         <a href="{{ url('data-mahasiswa') }}"
                             class="nav-link {{ request()->is('data-mahasiswa*') ? 'active' : '' }}">
                             <i class="nav-icon fas fa-table"></i>
                             <p>
                                 Data User
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="{{ url('tabel-skripsi') }}"
                             class="nav-link {{ request()->is('tabel-skripsi') ? 'active' : '' }}">
                             <i class="nav-icon fas fa-table"></i>
                             <p>
                                 Data Skripsi
                             </p>
                         </a>
                     </li>
                 @endcan

                 @can('mahasiswa')
                     <li class="nav-item">
                         <a href="{{ url('biodata') }}" class="nav-link {{ request()->is('biodata') ? 'active' : '' }}">
                             <i class="nav-icon fas fa-edit"></i>
                             <p>
                                 Biodata Saya
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ url('timeline') }}" class="nav-link {{ request()->is('timeline') ? 'active' : '' }}">
                             <i class="nav-icon fas fa-book"></i>
                             <p>
                                 Progress Skripsi
                             </p>
                         </a>
                     </li>
                 @endcan

                 @can('dosen')
                     {{-- <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-edit"></i>
                             <p>
                                 Forms
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="pages/forms/general.html" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>General Elements</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="pages/forms/advanced.html" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Advanced Elements</p>
                                 </a>
                             </li>
                         </ul>
                     </li> --}}
                     {{-- <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-table"></i>
                             <p>
                                 Tables
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="pages/tables/simple.html" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Simple Tables</p>
                                 </a>
                             </li>
                         </ul>
                     </li> --}}

                     <li class="nav-item">
                         <a href="{{ url('tabel-skripsi') }}"
                             class="nav-link {{ request()->is('tabel-skripsi') ? 'active' : '' }}">
                             <i class="nav-icon fas fa-table"></i>
                             <p>
                                 Data Skripsi
                             </p>
                         </a>
                     </li>
                 @endcan

                 <li class="nav-header">LAINNYA</li>
                 <li class="nav-item">
                     <a href="{{ url('logout') }}" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Logout
                         </p>
                     </a>
                 </li>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
