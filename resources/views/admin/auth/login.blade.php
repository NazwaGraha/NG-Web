<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>Login Administrator | NazwaGraha Backoffice</title>

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
    body {
      background: linear-gradient(135deg, #0e1726 0%, #1e293b 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: Arial, sans-serif;
    }
    .login-container {
      width: 100%;
      max-width: 440px;
      padding: 15px;
    }
    .login-panel {
      border-radius: 16px;
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
      background: #ffffff;
    }
    .login-panel .panel-heading {
      background: #10151d;
      color: #fff;
      text-align: center;
      padding: 28px 20px 22px;
      border-bottom: 3px solid #f47712;
    }
    .login-panel .panel-title {
      font-size: 18px;
      font-weight: 800;
      letter-spacing: 0.5px;
      margin-top: 10px;
    }
    .btn-login {
      background-color: #f47712;
      border-color: #f47712;
      color: #fff;
      font-weight: 800;
      font-size: 15px;
      padding: 12px;
      border-radius: 8px;
      transition: all 0.2s ease;
    }
    .btn-login:hover {
      background-color: #df6508;
      border-color: #df6508;
      color: #fff;
    }
    .security-badge {
      font-size: 11px;
      color: #94a3b8;
      text-align: center;
      margin-top: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }
  </style>
</head>
<body>

<div class="login-container">
  <div class="login-panel panel panel-default">
    <div class="panel-heading">
      <img src="{{ asset('assets/images/logo-nazwagraha.webp') }}" alt="NazwaGraha" style="height: 38px; display: inline-block;">
      <h3 class="panel-title">BACKOFFICE LOGIN</h3>
      <small style="color: #cbd5e1; font-size: 12px;">Sistem Administrasi Terproteksi</small>
    </div>
    <div class="panel-body" style="padding: 28px 24px;">

      @if(session('info'))
        <div class="alert alert-info alert-dismissible" role="alert">
          <i class="fa fa-info-circle fa-fw"></i> {{ session('info') }}
        </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger" style="font-size: 13px;">
          <i class="fa fa-shield fa-fw"></i>
          @foreach($errors->all() as $err)
            <div>{{ $err }}</div>
          @endforeach
        </div>
      @endif

      <form role="form" method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <fieldset>
          <div class="form-group">
            <label style="font-size: 12px; color: #475569; font-weight: 700;">ALAMAT EMAIL</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope text-muted"></i></span>
              <input class="form-control" placeholder="nazwagraha@gmail.com" name="email" type="email" value="{{ old('email') }}" required autofocus style="height: 44px;">
            </div>
          </div>

          <div class="form-group" style="margin-top: 18px;">
            <label style="font-size: 12px; color: #475569; font-weight: 700;">KATA SANDI (PASSWORD)</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock text-muted"></i></span>
              <input class="form-control" placeholder="••••••••••••" name="password" type="password" required style="height: 44px;">
            </div>
          </div>

          <div class="checkbox" style="margin: 16px 0 20px;">
            <label style="font-size: 13px; color: #475569;">
              <input name="remember" type="checkbox" value="1"> Ingat saya di perangkat ini
            </label>
          </div>

          <button type="submit" class="btn btn-lg btn-login btn-block">
            <i class="fa fa-sign-in fa-fw"></i> Masuk ke Dashboard
          </button>

          <div class="security-badge">
            <i class="fa fa-lock text-success"></i> Dilengkapi Proteksi Brute-Force Rate Limiter & Enkripsi Sesi
          </div>
        </fieldset>
      </form>
    </div>
  </div>

  <div style="text-align: center; margin-top: 15px;">
    <a href="{{ route('home') }}" style="color: #94a3b8; font-size: 12px; text-decoration: none;">
      ← Kembali ke Website Utama NazwaGraha
    </a>
  </div>
</div>

<!-- jQuery & Bootstrap -->
<script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/bootstrap.min.js') }}"></script>

</body>
</html>
