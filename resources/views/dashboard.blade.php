@extends('layout.index')

@section('content')
<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Galeri Album</h1>
        <p class="lead text-body-secondary">Simpan dan amankan foto anda di Galeri Album!!</p>
        <p>
          <a href="{{ route('album.create') }}" class="btn btn-sm btn-primary my-2"><i class="bx bx-plus"></i> Tambah Album</a>
          <a href="{{ route('view') }}" class="btn btn-sm btn-secondary"><i class="bx bx-show-alt"></i> Lihat semua gambar</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse($database as $data)
        <div class="col">
          <div class="card shadow-sm">
            <img src="{{ asset('storage/thumbnail/'.$data->thumbnail) }}" width="100%" height="225">
            <div class="card-body">
              <p class="card-text">{{ $data->nama }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="/gambar/{{ $data->id }}" class="btn btn-sm btn-outline-secondary" title="Lihat"><i class="bx bx-show-alt"></i></a>
                  <!-- <a href="/album/delete/{{ $data->id }}" class="btn btn-sm btn-outline-danger" title="Hapus Album"><i class="bx bx-trash"></i></a> -->
                  <button onclick="onDelete(this)" name="{{$data->nama}}" id="{{$data->id}}" class="btn btn-sm btn-outline-danger" title="Hapus Album"><i class="bx bx-trash"></i></button>
                </div>
                <small class="text-body-secondary">{{ $data->created_at }}</small>
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
    </div>
  </div>

</main>


<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album Galeri &copy;Copyright 2023</p>
  </div>
</footer>
@endsection
@push('script')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('sweetalert/sweetalert2.all.min.js')}}"></script>
@if(session('tambah'))
<script>
  Swal.fire({
    title: 'Berhasil',
    text: '{{session('tambah')}}',
    icon: 'success'
  })
</script>
@endif
<script>
function onDelete(data){
  const id = data.id;
  const album = data.name;
  const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
  Swal.fire({
        title: `Hapus Album ${album}?`,
        text: 'Semua gambar yang ada di album ini akan terhapus!!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'oke',
        cancelButtonColor: "#d33",
        cancelButtonText: 'cancel',
      }).then(function(result){
        if(result.isConfirmed){
        $.ajax({
          url: `/album/delete/${id}`,
          method: 'POST',
          data: {
            _token: CSRF_TOKEN,
          },success: function(){
          Swal.fire({
           title: 'Berhasil',
           text: 'Album berhasil dihapus',
           icon: 'success'
        }).then(function(result){
          if(result.isConfirmed){
            window.location.reload();
          }
        })
      }, error: function(){
        Swal.fire({
              position: "center",
              icon: "warning",
              title: `Gagal`,
              showConfirmButton: false,
              width: 500,
              timer: 1500,
            })
      }
      })
      }
    })
}
</script>
@endpush
