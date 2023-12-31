@extends('layouts.app')

@section('title', 'Detail Request Pasien')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    {{-- @dd($pasien) --}}
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Data Pasien</h1>
            </div>

            <div class="section-body">


                <br>
                <div class="row">
                    <div class="col-md">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Diri Pasien</h4>

                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table-striped table text-center" id="sortable-table">
                                        <thead>
                                            <tr>

                                                <th>Nama </th>
                                                <th>NIK </th>
                                                <th>Alamat</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Golongan Darah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $pasien->nama }}</td>
                                                <td>{{ $pasien->nik }}</td>
                                                <td>{{ $pasien->alamat }}</td>
                                                <td>{{ $pasien->jenis_kelamin }}</td>
                                                <td>{{ $pasien->tanggal_lahir }}</td>
                                                <td>{{ $pasien->golongan_darah }}</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md">
                        <div class="card">
                            <div class="card-header">
                                <h4>Perpanjang Masa Berlaku Data</h4>
                            </div>
                            <div class="card-body">
                                <form action="">
                                    <div class="form-group">
                                        <input type="Date"
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
                                    <button class="btn btn-success">Request</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Riwayat Penyakit</h4>

                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-4 m-4">
                                <img src="{{ asset('img/example-image.jpg') }}" width="400" alt="">
                            </div>
                            <div class="col-md-4 m-4">
                                <h5>Deskripsi</h5>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse quasi cumque, placeat
                                    quidem
                                    at, quas libero nihil facilis reprehenderit ratione rem praesentium repudiandae fugit
                                    obcaecati vel laudantium voluptatem fuga. Molestias?</p>
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
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-table.js') }}"></script>
@endpush
