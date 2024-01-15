@extends('layouts.app')

@section('title', 'Request Expired')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>

            </div>
            <div class="section-body">



                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">



                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Rs</th>
                                            <th>NIK</th>
                                            <th>Nama Pasien</th>
                                            <th>Tanggal Request</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($rekamMedisRequest as $rmr)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                @if ($title == 'List Data Request')
                                                    <td>{{ $rmr->user->name }}</td>
                                                @elseif($title == 'Status Request Pasien')
                                                    <td>{{ $rmr->rekamMedis->user->name }}</td>
                                                @endif
                                                <td>{{ $rmr->rekamMedis->pasien->nik }}</td>
                                                <td>{{ $rmr->rekamMedis->pasien->nama }}</td>
                                                <td>{{ $rmr->request_date }}</td>
                                                @if ($rmr->is_request)
                                                    <td><span class="badge badge-warning">Pending</span>
                                                    @else
                                                    <td><span class="badge badge-success">Success</span>
                                                @endif

                                                </td>
                                                <td>
                                                    @if ($title == 'List Data Request')
                                                        <form action="{{ route('request_expired.edit', $rmr->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('put')
                                                            @if ($rmr->is_request)
                                                                <button type="submit" class="badge badge-primary"
                                                                    type="submit">Setujui</button>
                                                            @else
                                                                <button disabled type="submit"
                                                                    class="badge badge-secondary"
                                                                    type="submit">Setujui</button>
                                                            @endif
                                                        </form>
                                                    @elseif($title == 'Status Request Pasien')
                                                        <form action="{{ route('request_status.destroy', $rmr->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')

                                                            <button type="submit" class="badge badge-danger"
                                                                type="submit">Delete</button>
                                                        </form>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                {{-- {{ $rekamMedisRequest->links() }} --}}
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
