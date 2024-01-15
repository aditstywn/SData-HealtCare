@extends('layouts.app')

@section('title', 'Data Diri Pasien')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Data Diri Pasien</h1>
            </div>

            <div class="section-body">


                <div class="row mb-2">
                    <div class="col-lg">
                        <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-danger"><i
                                class="fa-regular fa-circle-left"></i> Kembali</a>
                        <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-success ml-auto"><i
                                class="fa-solid fa-pen-to-square"></i> Edit
                            Data</a>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Diri Pasien</h4>

                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table-striped table " id="sortable-table">
                                        <tbody>
                                            <tr>
                                                <th>Nama </th>
                                                <td> : {{ $pasien->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>NIK </th>
                                                <td> : {{ $pasien->nik }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat </th>
                                                <td> : {{ $pasien->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin </th>
                                                <td> : {{ $pasien->jenis_kelamin }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir </th>
                                                <td> : {{ $pasien->tanggal_lahir }}</td>
                                            </tr>
                                            <tr>
                                                <th>Golongan Darah </th>
                                                <td> : {{ $pasien->golongan_darah }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Ibu Kandung </th>
                                                <td> : {{ $pasien->ibu_kandung }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Foto Pasien</h4>
                            </div>
                            <div class="card-body text-center">
                                <img src="data:image/png;base64,{{ $pasien->foto_pasien }}" alt="" height="350"
                                    style="max-width: 100%;">
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
