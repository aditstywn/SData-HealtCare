@extends('layouts.app')

@section('title', 'Edit Pasien')

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
                <h1>Edit Data Pasien</h1>
            </div>

            <div class="section-body">
                <div class="row mb-2">
                    <div class="col-lg">
                        <a href="{{ route('detail-pasien', $pasien->id) }}" class="btn btn-danger"><i
                                class="fa-regular fa-circle-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card">
                    <form action="{{ route('pasien.update', $pasien) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-header">
                            <h4>Input Data Pasien</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <label for="formFile" class="form-label">Foto Pasien</label>
                                <input type="hidden" name="oldImage" id="" value="{{ $pasien->foto_pasien }}">
                                @if ($pasien->foto_pasien)
                                    <img src="data:image/png;base64,{{ $pasien->foto_pasien }}" alt=""
                                        class="img-priview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img src="" alt="" class="img-priview img-fluid mb-3 col-sm-5">
                                @endif
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
                                    name="nama" value="{{ old('nama', $pasien->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Ibu Kandug</label>
                                <input type="text"
                                    class="form-control @error('ibu_kandung')
                                is-invalid
                            @enderror"
                                    name="ibu_kandung" value="{{ old('ibu_kandung', $pasien->ibu_kandung) }}">
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
                                    name="nik" value="{{ old('nik', $pasien->nik) }}">
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
                                    name="alamat" value="{{ old('alamat', $pasien->alamat) }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                    name="jenis_kelamin">
                                    <option value="Laki-laki"
                                        {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>
                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}">
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
                                            @if ($pasien->golongan_darah == 'A') checked @endif>
                                        <span class="selectgroup-button">A</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="golongan_darah" value="B" class="selectgroup-input"
                                            @if ($pasien->golongan_darah == 'B') checked @endif>
                                        <span class="selectgroup-button">B</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="golongan_darah" value="AB"
                                            class="selectgroup-input" @if ($pasien->golongan_darah == 'AB') checked @endif>
                                        <span class="selectgroup-button">AB</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="golongan_darah" value="O"
                                            class="selectgroup-input" @if ($pasien->golongan_darah == 'O') checked @endif>
                                        <span class="selectgroup-button">O</span>
                                    </label>
                                </div>
                            </div>



                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Edit Data</button>
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
