@extends('layouts.app')

@section('title', 'Request Data Pasien')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Request Data Pasien</h1>
            </div>

            <div class="section-body">

                <div class="row justify-content-center">
                    <div class="col-8 ">
                        <div class="card-header-action">
                            <form action="{{ route('request-pasien.index') }}">
                                <div class="input-group">
                                    <input type="text" class="form-control " placeholder="Search NIK" name="query">
                                    <div class="input-group-btn p-1">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <br>
                @if (count($pasiens) > 0)
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    <pclass="text-center">Data Pasien Ditemukan</pclass=>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    <p>Data Pasien Tidak Ditemukan / Terdaftar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                @if (count($pasiens) > 0)
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Pasien</h4>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table-striped table" id="sortable-table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Rumah Sakit</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pasiens as $pasien)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $pasien->user->name }}</td>
                                                        <td>{{ $pasien->nama }}</td>
                                                        <td>{{ $pasien->tanggal_lahir }}</td>
                                                        <td><a href="{{ route('request-pasien.show', $pasien->id) }}"
                                                                class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @else
                    <div class="row text-center justify-content-center">
                        <div class="col-lg-6">
                            <div class="card">
                                <h3 class="p-4">Searching Pasien By NIK</h3>
                            </div>
                        </div>
                    </div> --}}
                @endif
                {{-- {{ $pasiens->links() }} --}}
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
