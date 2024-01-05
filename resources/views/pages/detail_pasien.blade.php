@extends('layouts.app')

@section('title', 'Detail Pasien')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
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


                <div class="card">
                    <div class="card-header">
                        <h4>Riwayat Penyakit</h4>
                        <a href="{{ route('rekam-medis.create', ['pasien_id' => $pasien->id]) }}"
                            class="btn btn-success ml-auto">Tambah RM
                            Pasien</a>
                    </div>
                    @if ($pasien->rekamMedis->count())
                        @foreach ($pasien->rekamMedis as $rm)
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-md-4 m-4">
                                        <img src="data:image/png;base64,{{ $rm->image }}" width="300" height="300"
                                            alt="">
                                    </div>
                                    <div class="col-md-4 m-4">
                                        <h5>Deskripsi</h5>
                                        <p>{{ $rm->deskripsi }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md ml-4">
                                        <p>Tanggal Periksa : {{ $rm->tanggal_periksa }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md">
                                    <h4>Tidak Terdapat Data Rekam Medis Pasien</h4>
                                </div>
                            </div>
                        </div>
                    @endif
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
