<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Dashboard') | NazwaGraha Backoffice</title>

  <!-- Bootstrap Core CSS (from TemplateAdmin) -->
  <link href="{{ asset('admin-assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- MetisMenu CSS -->
  <link href="{{ asset('admin-assets/css/metisMenu.min.css') }}" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="{{ asset('admin-assets/css/startmin.css') }}" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="{{ asset('admin-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

  <link rel="icon" type="image/webp" href="{{ asset('assets/images/logo-nazwagraha.webp') }}">

  <style>
    :root {
      --admin-primary: #10151d;
      --admin-orange: #f47712;
      --admin-orange-hover: #df6508;
    }
    .navbar-inverse {
      background-color: var(--admin-primary);
      border-color: #222b38;
    }
    .navbar-brand {
      color: #fff !important;
      font-weight: 800;
      letter-spacing: 0.5px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .navbar-brand span {
      color: var(--admin-orange);
    }
    .sidebar {
      background: #f8fafc;
    }
    .sidebar .nav > li > a {
      color: #334155;
      font-weight: 600;
      padding: 12px 15px;
      border-bottom: 1px solid #edf2f7;
    }
    .sidebar .nav > li > a:hover,
    .sidebar .nav > li > a.active {
      background-color: #f1f5f9;
      color: var(--admin-orange);
    }
    .sidebar .nav-second-level li a {
      padding-left: 38px;
      font-size: 13px;
    }
    .btn-orange {
      background-color: var(--admin-orange);
      border-color: var(--admin-orange);
      color: #fff;
      font-weight: 700;
    }
    .btn-orange:hover,
    .btn-orange:focus {
      background-color: var(--admin-orange-hover);
      border-color: var(--admin-orange-hover);
      color: #fff;
    }
    .badge-orange {
      background-color: var(--admin-orange);
    }
    .page-header {
      margin-top: 20px;
      font-weight: 800;
      color: #0f172a;
      border-bottom: 2px solid #e2e8f0;
      padding-bottom: 14px;
    }
    .panel-primary > .panel-heading {
      background-color: #1e293b;
      border-color: #1e293b;
    }
    .huge {
      font-size: 34px;
      font-weight: 800;
      line-height: normal;
    }
    .table > thead > tr > th {
      background: #f1f5f9;
      color: #334155;
      border-bottom: 2px solid #cbd5e1;
    }
    /* Pagination Styling */
    .pagination {
      margin: 0;
      display: inline-flex;
      border-radius: 8px;
      vertical-align: middle;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    .pagination > li > a,
    .pagination > li > span {
      color: #334155;
      font-weight: 600;
      border: 1px solid #e2e8f0;
      padding: 6px 13px;
      font-size: 13px;
      margin-left: -1px;
      transition: all 0.15s ease-in-out;
      background: #ffffff;
      text-decoration: none;
    }
    .pagination > li:first-child > a,
    .pagination > li:first-child > span {
      margin-left: 0;
      border-top-left-radius: 6px;
      border-bottom-left-radius: 6px;
    }
    .pagination > li:last-child > a,
    .pagination > li:last-child > span {
      border-top-right-radius: 6px;
      border-bottom-right-radius: 6px;
    }
    .pagination > li > a:hover,
    .pagination > li > a:focus {
      color: var(--admin-orange);
      background-color: #fff7ed;
      border-color: #fdba74;
      z-index: 2;
    }
    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
      background-color: var(--admin-orange) !important;
      border-color: var(--admin-orange) !important;
      color: #ffffff !important;
      font-weight: 700;
      z-index: 3;
      box-shadow: 0 2px 6px rgba(244, 119, 18, 0.35);
    }
    .pagination > .disabled > span,
    .pagination > .disabled > a,
    .pagination > .disabled > a:hover,
    .pagination > .disabled > a:focus {
      color: #94a3b8;
      background-color: #f8fafc;
      border-color: #e2e8f0;
      cursor: not-allowed;
    }
  </style>

  @yield('styles')
</head>
<body>

<div id="wrapper">

  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('assets/images/logo-nazwagraha.webp') }}" alt="NazwaGraha" style="height: 28px; display: inline-block;">
        <span>BACKOFFICE</span>
      </a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
      <li>
        <a href="{{ route('home') }}" target="_blank">
          <i class="fa fa-external-link fa-fw"></i> Lihat Website Publik
        </a>
      </li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-user-circle fa-fw"></i> {{ Auth::user()->name ?? 'Administrator' }} <b class="caret"></b>
        </a>
        <ul class="dropdown-menu dropdown-user">
          <li>
            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
          </li>
          <li class="divider"></li>
          <li>
            <form action="{{ route('admin.logout') }}" method="POST" id="logoutForm" style="display: none;">
              @csrf
            </form>
            <a href="javascript:void(0)" onclick="document.getElementById('logoutForm').submit();">
              <i class="fa fa-sign-out fa-fw text-danger"></i> Logout Aman
            </a>
          </li>
        </ul>
      </li>
    </ul>

    <!-- Sidebar Menu -->
    <aside class="sidebar navbar-default" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          <li class="sidebar-search" style="padding: 12px 15px; color: #64748b; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;">
            MENU UTAMA
          </li>
          <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <i class="fa fa-dashboard fa-fw"></i> Dashboard
            </a>
          </li>

          <li class="{{ request()->routeIs('admin.articles.*') || request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-newspaper-o fa-fw"></i> Manajemen Artikel <span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level">
              <li>
                <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.index') ? 'active' : '' }}">
                  <i class="fa fa-list fa-fw"></i> Semua Artikel
                </a>
              </li>
              <li>
                <a href="{{ route('admin.articles.create') }}" class="{{ request()->routeIs('admin.articles.create') ? 'active' : '' }}">
                  <i class="fa fa-plus-circle fa-fw"></i> Tulis Artikel Baru
                </a>
              </li>
              <li>
                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                  <i class="fa fa-tags fa-fw"></i> Kategori Artikel
                </a>
              </li>
            </ul>
          </li>

          <li>
            <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
              <i class="fa fa-star fa-fw" style="color: #f59e0b;"></i> Layanan Unggulan
            </a>
          </li>

          <li>
            <a href="{{ route('admin.service-pages.index') }}" class="{{ request()->routeIs('admin.service-pages.*') ? 'active' : '' }}">
              <i class="fa fa-cogs fa-fw" style="color: #0284c7;"></i> Konten Sub-Menu Layanan
            </a>
          </li>

          <li>
            <a href="{{ route('admin.portfolios.index') }}" class="{{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}">
              <i class="fa fa-briefcase fa-fw" style="color: #10b981;"></i> Portofolio & Proyek Nyata
            </a>
          </li>

          <li>
            <a href="{{ route('admin.inquiries.index') }}" class="{{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
              <i class="fa fa-envelope-o fa-fw"></i> Prospek & Pesan Masuk
            </a>
          </li>

          <li class="sidebar-search" style="padding: 15px 15px 8px; color: #64748b; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;">
            SISTEM
          </li>
          <li>
            <a href="{{ route('home') }}" target="_blank">
              <i class="fa fa-globe fa-fw"></i> Beranda Publik
            </a>
          </li>
          <li>
            <a href="{{ route('articles.index') }}" target="_blank">
              <i class="fa fa-book fa-fw"></i> Halaman News & Events
            </a>
          </li>
          <li>
            <a href="javascript:void(0)" onclick="document.getElementById('logoutForm').submit();" style="color: #dc2626;">
              <i class="fa fa-power-off fa-fw"></i> Keluar (Logout)
            </a>
          </li>
        </ul>
      </div>
    </aside>
  </nav>

  <!-- Page Content Wrapper -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">@yield('page-title', 'Dashboard')</h1>
        </div>
      </div>

      <!-- Flash Notification Alerts -->
      @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="fa fa-check-circle fa-fw"></i> {{ session('success') }}
        </div>
      @endif

      @if(session('warning'))
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="fa fa-exclamation-triangle fa-fw"></i> {{ session('warning') }}
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="fa fa-times-circle fa-fw"></i> {{ session('error') }}
        </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <b><i class="fa fa-exclamation-circle fa-fw"></i> Terjadi kesalahan pada formulir:</b>
          <ul style="margin: 6px 0 0 18px;">
            @foreach($errors->all() as $err)
              <li>{{ $err }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @yield('content')

    </div>
  </div>

</div>

<!-- Core Scripts (from TemplateAdmin) -->
<script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/startmin.js') }}"></script>

@yield('scripts')

</body>
</html>
