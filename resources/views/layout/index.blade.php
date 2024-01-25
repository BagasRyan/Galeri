<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.118.2">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Galeri Album</title>


<link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/icons.css')}}" rel="stylesheet" />
<!-- <link href="{{ asset('css/index.css') }}" rel="stlesheet"> -->
<!-- <link href="{{ asset('sweetalert/sweetalert2.css') }}" rel="stlesheet"> -->
<link href="{{ asset('sweetalert/sweetalert2.min.css') }}" rel="stlesheet">
@yield('style')
  </head>
  <body>
<header data-bs-theme="dark">
  <div class="collapse text-bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4>Tentang</h4>
          <p class="text-body-secondary">Simpan foto dan gambar anda di Galeri karena foto dan gambar adalah media yang dapat dikenang</p>
        </div>
      </div>
    </div>
    
  </div>
  
      

  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="/" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Album</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

@yield('content')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/color-modes.js')}}"></script>

@stack('script')
    </body>
</html>
