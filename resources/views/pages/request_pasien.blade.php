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
                <div class="row">
                    <div class="col-8">
                        <div class="alert alert-success" role="alert">
                            Data Pasien Ditemukan !
                        </div>
                    </div>
                </div>
                <br>
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

                                                <th>Nama Rumah Sakit</th>
                                                <th>Nama Pasien</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pasiens as $pasien)
                                                <tr>

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
