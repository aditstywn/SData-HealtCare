@extends('layouts.app')

@section('title', 'Add Rekam Medis')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data Pasien</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Rekam Medis Pasien</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('rekam-medis.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="pasien_id" value="{{ $pasien_id }}">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Add Image</label>
                                        <img src="" alt="" class="img-priview img-fluid mb-3 col-sm-5">
                                        <input
                                            class="form-control @error('image')
                                        is-invalid
                                        @enderror"
                                            type="file" id="image" name="image" onchange="previewImage()">
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="mb-3">
                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                            <input type="text" name="deskripsi"
                                                class="form-control @error('deskripsi')
                                                is-invalid
                                            @enderror"
                                                id="deskripsi" autofocus value="{{ old('deskripsi') }}">
                                            @error('deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-3 ">
                                                <label for="tanggal_periksa" class="form-label">Tanggal Periksa</label>
                                                <input type="date" name="tanggal_periksa"
                                                    class="form-control @error('tanggal_periksa')
                                                    is-invalid
                                                @enderror"
                                                    id="tanggal_periksa" value="{{ old('tanggal_periksa') }}">
                                                @error('tanggal_periksa')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-3 ">
                                                <label for="expired" class="form-label">Expired</label>
                                                <input type="date" name="expired"
                                                    class="form-control @error('expired')
                                                    is-invalid
                                                @enderror"
                                                    id="expired" value="{{ old('expired') }}">
                                                @error('expired')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Rekam Medis</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script>
        function previewImage() {

            const image = document.querySelector('#image');
            const imagePreview = document.querySelector('.img-priview');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>

    <!-- Page Specific JS File -->
@endpush
