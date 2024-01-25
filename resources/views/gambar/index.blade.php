@extends('layout.index')

@section('content')
<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{ $album->nama }}</h1>
        <p class="lead text-body-secondary">{{ $album->description }}</p>
        <p>
          <a href="/gambar/create/{{ $album->id }}" class="btn btn-primary my-2"><i class="bx bx-plus"></i> Tambahkan Gambar</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($database as $gambar)
        <div class="col">
          <div class="card shadow-sm">
            <img src="{{ asset('storage/'.$gambar->gambar) }}" width="100%" height="225">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <!-- <a href="/gambar/delete/{{ $gambar->id }}" class="btn btn-sm btn-outline-danger" title="Hapus Gambar"><i class="bx bx-trash"></i></a> -->
                  <button onclick="onDelete(this)" id="{{$gambar->id}}" class="btn btn-sm btn-outline-danger" title="Hapus Gambar"><i class="bx bx-trash"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

</main>


@endsection
@push('script')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('sweetalert/sweetalert2.all.min.js')}}"></script>
@if(Session('tambah'))
<script>
  Swal.fire({
    title: "Berhasil",
    text: "{{ session('tambah') }}",
    icon: "success"
      })
</script>
@endif
<script>
  function onDelete(data){
   const id = data.id;
   const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    Swal.fire({
      title: `Yakin hapus gambar ini?`,
      text: 'Gambar yang dihapus tidak dapat dikembalikan!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Tidak',
      cancelButtonColor: '#d33',
    }).then(function(result){
      if(result.isConfirmed){
        $.ajax({
          url: `/gambar/delete/${id}`,
          method: 'POST',
          data: {
            _token: CSRF_TOKEN,
          },success: function(){
        Swal.fire({
          title: 'Berhasil',
          text: 'Gambar berhasil dihapus',
          icon: 'success',
        }).then(function(result){
          if(result.isConfirmed){
            window.location.reload();
          }
        })
      },error: function () {
            Swal.fire({
              position: "center",
              icon: "warning",
              title: `Gagal`,
              showConfirmButton: false,
              width: 500,
              timer: 1500,
            });
          },
      })
      
      }
    })
  }
</script>
@endpush

