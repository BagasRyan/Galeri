@extends('layout.index')

@section('content')
<div class="container p-5">
    <a href="/" class="btn btn-primary mb-3"><i class="bx bx-undo"></i> Kembali</a>
    <div class="card">
        <div class="card-body">
                                        <h5 class="mb-0 text-primary">Tambah Album</h5>
                                        <form class="row g-3" action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="col-md-12">
                                            <label for="nama" class="form-label">Nama Album</label>
                                            <input type="text" name="name" class="form-control" id="nama">
                                        </div>

                                        <label class="form-label" for="file">Thumbnail</label>
                                        <img src="" class="col-md-12 mb-2" id="thumbnail" width="auto" height="auto">
                                        <div class="input-group row">
                                        <input type="file" name="thumb" class="form-control col-11 @error('thumb') is-invalid @enderror" id="file">
                                        @error('thumb')
                                        <div class="is-invalid-feedbback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <label class="input-group-text col-1" for="file">Upload</label>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputAddress2" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" name="description" id="inputAddress2" rows="3"></textarea>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary px-5">Konfirm</button>
                                        </div>
                                    </form>
</div>
</div>
</div>

@endsection
@push('script')
<script>
    const thumbnail = document.getElementById('thumbnail');
    const file = document.getElementById('file');

    file.addEventListener('change', function(){
        thumbnail.style.width = '300px';
        thumbnail.style.height = '200px';
        thumbnail.src = URL.createObjectURL(file.files[0]);
    });

</script>
@endpush