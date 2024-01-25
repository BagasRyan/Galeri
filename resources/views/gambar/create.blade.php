@extends('layout.index')

@section('content')
<div class="container mt-3">
<a href="/gambar/{{ $id }}" class="btn btn-primary mb-3"><i class="bx bx-undo"></i> Kembali</a>
    <div class="card">
        <div class="card-body">
            <h5 class="text-dark">Upload gambar anda</h5>
            <hr>
            <form action="{{ route('gambar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <img src="" class="col-md-12 mb-2" id="thumbnail">
            <div class="input-group">
                                        <input type="file" name="gambar" class="form-control file @error('gambar') is-invalid @enderror" id="inputGroupFile02">
                                        <input type="hidden" value="{{ $id }}" name="albumId">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                    @error('gambar')
                                    <div class="is-invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
const gambar = document.getElementById('thumbnail');
const input = document.getElementsByClassName('file')[0];


input.addEventListener('change', function(){
    gambar.style.width = '300px';
    gambar.style.height = '200px';
    gambar.src = URL.createObjectURL(input.files[0]);
});
</script>
@endpush
