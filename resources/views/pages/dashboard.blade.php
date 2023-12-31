@extends('layouts.app')

@section('title', 'Home')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Home</h1>
            </div>
            <div class="section-body">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Pasien</h4>
                                </div>
                                <div class="card-body">

                                    {{ auth()->user()->pasien()->count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Rekam Medis</h4>
                                </div>
                                <div class="card-body">

                                    {{ auth()->user()->rekamMedis()->count() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="row justify-content-center">
                    <div class="col-8 ">
                        <div class="card-header-action">
                            <form action="{{ route('pasien.index') }}">
                                {{-- @csrf --}}
                                <div class="input-group">
                                    <input type="text" class="form-control " placeholder="Search NIK" name="nik">
                                    <div class="input-group-btn p-1">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>

                <div class="table-responsive">
                    <table class="table-striped table">
                        <tr>
                            <th>No.</th>
                            <th>Nama </th>
                            <th>NIK</th>
                            <th>Tanggal Lahir</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($pasiens as $pasien)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pasien->nama }}</td>
                                <td>{{ $pasien->nik }}</td>
                                <td>{{ $pasien->tanggal_lahir }}</td>
                                <td>
                                    <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>

                {{ $pasiens->links() }}
            </div>


        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
