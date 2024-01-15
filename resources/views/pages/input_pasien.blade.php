@extends('layouts.app')

@section('title', 'Input Pasien')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Input Data Pasien</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('pasien.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Input Data Pasien</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Foto Pasien</label>
                                <img src="" alt="" class="img-priview img-fluid mb-3 col-sm-5">
                                <input
                                    class="form-control @error('foto_pasien')
                                is-invalid
                                @enderror"
                                    type="file" id="foto_pasien" name="foto_pasien" onchange="previewImage()">
                                @error('foto_pasien')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text"
                                    class="form-control @error('nama')
                                is-invalid
                            @enderror"
                                    name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ibu Kandung</label>
                                <input type="text"
                                    class="form-control @error('ibu_kandung')
                                is-invalid
                            @enderror"
                                    name="ibu_kandung" value="{{ old('ibu_kandung') }}">
                                @error('ibu_kandung')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text"
                                    class="form-control @error('nik')
                                is-invalid
                                @enderror"
                                    name="nik" value="{{ old('nik') }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text"
                                    class="form-control @error('alamat')
                                is-invalid
                                @enderror"
                                    name="alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select
                                    class="form-control @error('jenis_kelamin')
                                is-invalid
                                @enderror"
                                    name="jenis_kelamin">
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date"
                                    class="form-control datepicker @error('tanggal_lahir')
                                is-invalid
                                @enderror"
                                    name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label class="form-label">Golongan Darah</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="golongan_darah" value="A" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">A</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="golongan_darah" value="B"
                                            class="selectgroup-input">
                                        <span class="selectgroup-button">B</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="golongan_darah" value="AB"
                                            class="selectgroup-input">
                                        <span class="selectgroup-button">AB</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="golongan_darah" value="O"
                                            class="selectgroup-input">
                                        <span class="selectgroup-button">O</span>
                                    </label>
                                </div>
                            </div>



                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage() {

            const image = document.querySelector('#foto_pasien');
            const imagePreview = document.querySelector('.img-priview');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endpush
