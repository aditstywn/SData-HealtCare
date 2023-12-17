{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
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
                <h1>Dashboard Data Pasien</h1>
            </div>
            <div class="section-body">
                <div class="row">
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
                                    10
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-8 ">
                        <div class="card-header-action">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control " placeholder="Search NIK">
                                    <div class="input-group-btn p-1">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                {{-- <div class="row">
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

                                                <th>Nama </th>
                                                <th>Nik</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Rs. Adit Sehat Selalu</td>
                                                <td>0090202020</td>
                                                <td>32-02-2023</td>
                                                <td>
                                                    <a href="{{ route('detail') }}" class="btn btn-info">Detail</a>
                                                    <a href="#" class="btn btn-success">Tambah</a>
                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="table-responsive">
                    <table class="table-striped table">
                        <tr>

                            <th>Nama </th>
                            <th>Nik</th>
                            <th>Tanggal Lahir</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>Rs. Adit Sehat Selalu</td>
                            <td>0090202020</td>
                            <td>32-02-2023</td>
                            <td>
                                <a href="{{ route('detail') }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('update') }}" class="btn btn-success">Tambah</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Rs. Adit Sehat Selalu</td>
                            <td>0090202020</td>
                            <td>32-02-2023</td>
                            <td>
                                <a href="{{ route('detail') }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('update') }}" class="btn btn-success">Tambah</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Rs. Adit Sehat Selalu</td>
                            <td>0090202020</td>
                            <td>32-02-2023</td>
                            <td>
                                <a href="{{ route('detail') }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('update') }}" class="btn btn-success">Tambah</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Rs. Adit Sehat Selalu</td>
                            <td>0090202020</td>
                            <td>32-02-2023</td>
                            <td>
                                <a href="{{ route('detail') }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('update') }}" class="btn btn-success">Tambah</a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="float-right">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
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
