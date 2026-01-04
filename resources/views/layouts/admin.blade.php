<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Fragrance Of God | Admin')</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('back/dist/css/adminlte.min.css') }}">

  <!-- Plugins -->
  <link rel="stylesheet" href="{{ asset('back/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('back/plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('back/plugins/select2/css/select2.min.css') }}">

  <link rel="icon" href="{{ asset('frontend/img/logo.png') }}">
  @yield('styles')
  @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('frontend/img/logo.png') }}" height="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
       <img src="{{ asset('frontend/img/Fog Logo.png') }}" alt="Fragrance Of God" class="brand-image">
    <span class="brand-text font-weight-light">FOG</span>
    </a>

    <div class="sidebar">

      <!-- User -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->avatar ?? 'https://www.gravatar.com/avatar/?d=mp' }}"
               class="img-circle elevation-2">
        </div>
        <div class="info">
          <span class="d-block text-white">{{ Auth::user()->name }}</span>
          <small class="text-muted">{{ Auth::user()->getRoleNames()->first() }}</small>
        </div>
      </div>

      <!-- Menu -->
     <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <!-- Dashboard -->
    <li class="nav-item">
      <a href="{{ route('admin.dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-gauge-high"></i>
        <p>Dashboard</p>
      </a>
    </li>

    <!-- PROGRAMS & PROJECTS -->
    <li class="nav-header">PROGRAMS & PROJECTS</li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-diagram-project"></i>
        <p>
          Programs
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/admin/programs" class="nav-link">
            <i class="fas fa-list nav-icon"></i>
            <p>All Programs</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/programs/create" class="nav-link">
            <i class="fas fa-plus nav-icon"></i>
            <p>Create Program</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a href="/admin/projects" class="nav-link">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>Projects</p>
      </a>
    </li>

    <!-- EVENTS & CAMPAIGNS -->
    <li class="nav-header">EVENTS & CAMPAIGNS</li>

    <li class="nav-item">
      <a href="/admin/events" class="nav-link">
        <i class="nav-icon fas fa-calendar-days"></i>
        <p>Events</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/admin/campaigns" class="nav-link">
        <i class="nav-icon fas fa-bullhorn"></i>
        <p>Campaigns</p>
      </a>
    </li>

    <!-- CONTENT & MEDIA -->
    <li class="nav-header">CONTENT & MEDIA</li>

    <li class="nav-item">
      <a href="/admin/stories" class="nav-link">
        <i class="nav-icon fas fa-book-open"></i>
        <p>Stories</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/admin/blogs" class="nav-link">
        <i class="nav-icon fas fa-pen-nib"></i>
        <p>Blogs & Articles</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/admin/media" class="nav-link">
        <i class="nav-icon fas fa-photo-film"></i>
        <p>Media Gallery</p>
      </a>
    </li>

    <!-- IMPACT & M&E -->
    <li class="nav-header">IMPACT & M&E</li>

    <li class="nav-item">
      <a href="/admin/impacts" class="nav-link">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Core Impact</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/admin/beneficiaries" class="nav-link">
        <i class="nav-icon fas fa-people-group"></i>
        <p>Beneficiaries</p>
      </a>
    </li>

    <!-- ORGANIZATION -->
    <li class="nav-header">ORGANIZATION</li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users-gear"></i>
        <p>
          Staff & Access
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/admin/users" class="nav-link">
            <i class="fas fa-user nav-icon"></i>
            <p>Users</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/roles-and-permissions" class="nav-link">
            <i class="fas fa-user-shield nav-icon"></i>
            <p>Roles & Permissions</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- COMMUNICATION -->
    <li class="nav-header">COMMUNICATION</li>

    <li class="nav-item">
      <a href="/admin/messages" class="nav-link">
        <i class="nav-icon fas fa-envelope-open-text"></i>
        <p>Messages</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="/admin/subscribers" class="nav-link">
        <i class="nav-icon fas fa-paper-plane"></i>
        <p>Newsletter</p>
      </a>
    </li>

    <!-- SYSTEM -->
    <li class="nav-header">SYSTEM</li>

    <li class="nav-item">
      <a href="/admin/settings" class="nav-link">
        <i class="nav-icon fas fa-gear"></i>
        <p>Settings</p>
      </a>
    </li>

    <!-- LOGOUT -->
    @auth
    <li class="nav-item mt-3 border-top border-secondary">
      <a href="#" class="nav-link text-danger"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-right-from-bracket"></i>
        <p>Logout</p>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li>
    @endauth

  </ul>
</nav>

    </div>
  </aside>

  <!-- Content -->
  <div class="content-wrapper">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="main-footer text-sm">
    <strong>&copy; {{ date('Y') }} Fragrance Of God Organization.</strong>
    All rights reserved.
  </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('back/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('back/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('back/plugins/select2/js/select2.full.min.js') }}"></script>

@livewireScripts
@stack('scripts')
</body>
</html>
