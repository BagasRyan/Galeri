@extends('layout.index')

@section('content')
<div class="container mt-3">
<section class="py-5 text-center container">
    <div class="row">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Semua gambar anda akan muncul disini</h1>
       
      </div>
    </div>
  </section>
    @forelse($database as $data)
    <div class="card border-0">
      <div class="card-body">
      <div class="container">
          <div class="card shadow-sm mt-3">
          <div class="card-body">
              <p class="card-text"><i class="bx bx-collection"></i> Album: {{ $data->nama }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-body-secondary"><i class="bx bx-history"></i> {{ $data->created_at }}</small>
              </div>
            </div>
            <img src="{{ asset('storage/'.$data->gambar) }}" width="auto" height="auto">
          </div>
        </div>
      </div>
    </div>
    @empty
    <div class="card">
      <div class="card-body d-flex justify-content-center align-items-center">
        <h5>Anda belum memposting gambar apapun</h5>
      </div>
    </div>
          @endforelse
</div>

<!-- contoh -->

<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#" class="btn btn-sm btn-outline-primary"><i class="bx bx-arrow-to-top"></i>Back to top</a>
    </p>
  </div>
</footer>
@endsection