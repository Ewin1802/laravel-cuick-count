@extends('layouts.app')

@section('title', 'Partai')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Partai</h1>
                <div class="section-header-button">
                    <a href="{{ route('partai.create') }}"
                        class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Partai</a></div>
                    <div class="breadcrumb-item">Daftar Partai</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Partai</h2>
                <p class="section-lead">
                    Anda dapat mengelola Data Partai, seperti mengedit, menghapus, dan lainnya.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Partai</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form method="GET" action="{{route('partai.index')}}">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Search" name="nm_partai">
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
                                            <th>id</th>
                                            <th>Partai</th>
                                            <th>No Urut Partai</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($partais as $partai)
                                        <tr>
                                            <td>
                                                {{$partai->id}}
                                            </td>
                                            <td>
                                                {{$partai->nm_partai}}
                                            </td>
                                            <td>
                                                {{$partai->no_partai}}
                                            </td>

                                            <td>
                                                <div class="d-flex left-content-center">
                                                    <a href='{{ route('partai.edit', $partai->id) }}'
                                                        class="btn btn-sm btn-info btn-icon">
                                                        <i class="fas fa-edit"></i>
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('partai.destroy', $partai->id) }}" method="POST"
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


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $partais->withQueryString()->links() }}
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
