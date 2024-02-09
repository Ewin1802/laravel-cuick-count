@extends('layouts.app')

@section('title', 'Data Caleg')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Caleg</h1>
                <div class="section-header-button">
                    <a href="{{ route('paslon.create') }}"
                        class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Pemilihan</a></div>
                    <div class="breadcrumb-item">Data Caleg</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Petunjuk</h2>
                <p class="section-lead">
                    Pada Halaman ini, Anda dapat mencari data Caleg serta Mengubah dan Menghapus Data.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <h4>Daftar Caleg</h4>
                            </div> --}}
                            <div class="card-body">
                                {{-- <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div> --}}
                                <div class="card-header">
                                    <h4>Data Caleg</h4>
                                </div>
                                <div class="float-right">
                                    <form method="GET" action="{{route('paslon.index')}}">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Cari Nama Caleg" name="nama_paslon">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            {{-- <th>id</th> --}}
                                            <th>Nama Caleg</th>
                                            <th>Nomor Urut Caleg</th>
                                            <th>Partai</th>
                                            <th>Action</th>
                                        </tr>

                                        @foreach ($paslons as $paslon)
                                        <tr>
                                            {{-- <td>
                                                {{$paslon->id}}
                                            </td> --}}

                                            <td>
                                                {{$paslon->nama_paslon}}
                                            </td>
                                            <td>
                                                {{$paslon->no_urut}}
                                            </td>
                                            <td>
                                                {{$paslon->nama_partai}}
                                            </td>

                                            <td>
                                                <div class="d-flex left-content-center">
                                                    <a href='{{ route('paslon.edit', $paslon->id) }}'
                                                        class="btn btn-sm btn-info btn-icon">
                                                        <i class="fas fa-edit"></i>
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('paslon.destroy', $paslon->id) }}" method="POST"
                                                        class="ml-2">
                                                        <input type="hidden" name="_method" value="DELETE" />
                                                        <input type="hidden" name="_token"
                                                            value="{{ csrf_token() }}" />
                                                        <button class="btn btn-sm btn-danger btn-icon" onclick="return confirm('Butul mo hapus ini data?')">
                                                            <i class="fas fa-times"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                        {{-- @foreach ($partais as $partai)
                                        @endforeach --}}

                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $paslons->withQueryString()->links() }}
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
