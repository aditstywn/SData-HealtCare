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


                <div class="row mb-2">
                    <div class="col-lg">
                        <a href="{{ route('request-pasien.index') }}" class="btn btn-danger "><i
                                class="fa-regular fa-circle-left"></i>
                            Kembali</a>
                    </div>
                </div>
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
                                                {{-- <th>Alamat</th> --}}
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Golongan Darah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $pasien->nama }}</td>
                                                <td>{{ $pasien->nik }}</td>
                                                {{-- <td>{{ $pasien->alamat }}</td> --}}
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
                {{-- <div class="row ">
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
                </div> --}}

                <div class="card">
                    @if ($pasien->rekamMedis->count())
                        @foreach ($pasien->rekamMedis as $rm)
                            @if ($rm->expired < $dateNow)
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg ml-4">
                                            <span class="font-weight-bold">
                                                Expired
                                            </span>
                                            <span class="font-weight-bold text-danger">
                                                {{ $rm->expired }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 m-4 bg-secondary" style="height: 250px">
                                        </div>
                                        <div class="col-md-4 m-4">
                                            <h5>Deskripsi</h5>
                                            <p>{{ $rm->deskripsi }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <form action="{{ route('rekam-medis.update', $rm->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="form-group">
                                                    <input type="hidden" name="rekam_medis_id" value="{{ $rm->id }}">
                                                    <input type="hidden" name="is_request" value=1>
                                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                    <input type="Date"
                                                        class="form-control @error('nama')
                                                        is-invalid
                                                    @enderror"
                                                        name="request_date">
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
                                    <div class="row">
                                        <div class="col-md ml-4">
                                            <p>Tanggal Periksa : {{ $rm->tanggal_periksa }}</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg ml-4">
                                            <span class="font-weight-bold">
                                                Expired
                                            </span>
                                            <span class="font-weight-bold text-success">
                                                {{ $rm->expired }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-4 m-4">
                                            <img src="data:image/png;base64,{{ $rm->image }}" width="300"
                                                height="300" alt="">
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
                            @endif
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
                    </>

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
