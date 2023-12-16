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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Diri Pasien</h4>

                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="sortable-table">
                                        <thead>
                                            <tr>

                                                <th>Nama </th>
                                                <th>Alamat</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>Adit</td>
                                                <td>Batang</td>
                                                <td>
                                                    Laki-Laki
                                                </td>
                                                <td>19-192-92</td>
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
