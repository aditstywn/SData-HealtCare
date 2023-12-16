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
                    <form action="" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Input Data Pasien</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text"
                                    class="form-control @error('nama')
                                is-invalid
                            @enderror"
                                    name="nama">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nik</label>
                                <input type="nik"
                                    class="form-control @error('nik')
                                is-invalid
                                @enderror"
                                    name="nik">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>alamat</label>
                                <input type="alamat"
                                    class="form-control @error('alamat')
                                is-invalid
                                @enderror"
                                    name="alamat">
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
                                <input type="text"
                                    class="form-control datepicker @error('tanggal_lahir')
                                is-invalid
                                @enderror"
                                    name="tanggal_lahir">
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
                                        <input type="radio" name="value" value="A" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">A</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="B" class="selectgroup-input">
                                        <span class="selectgroup-button">B</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="AB" class="selectgroup-input">
                                        <span class="selectgroup-button">AB</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="O" class="selectgroup-input">
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
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endpush
