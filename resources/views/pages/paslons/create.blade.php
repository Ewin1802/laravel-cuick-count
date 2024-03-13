@extends('layouts.app')

@section('title', 'Form Tambah Caleg')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data Caleg</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Tambah Data</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Petunjuk</h2>
                <p class="section-lead">Nama Caleg diisi dengan Huruf, Nomor Urut diisi dengan Angka</p>


                        <div class="card-body">
                            <form action="{{ route('paslon.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="form-group">
                                    <label for="nama_partai">Pilih Partai:</label>
                                    <select name="nama_partai" id="nama_partai" class="form-control">
                                        @foreach(['1 - PKB','2 - GERINDRA','3 - PDIP','4 - GOLKAR', '5 - NASDEM', '6 - PARTAI BURUH', '7 - GELORA','8 - PKS','9 - PKN','10 - HANURA','11 - GARUDA','12 - PAN','13 - PBB','14 - DEMOKRAT','15 - PSI','16 - PERINDO','17 - PPP'] as $option)
                                            <option value="{{ $option }}" {{  $option ? 'selected' : '' }}>{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Caleg</label>
                                    <input type="text"
                                    class="form-control
                                    @error('nama_paslon')
                                        is-invalid
                                    @enderror"
                                    name="nama_paslon">
                                    @error('nama_paslon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Nomor Urut</label>
                                    <input type="number"
                                    class="form-control
                                    @error('no_urut')
                                        is-invalid
                                    @enderror"
                                    name="no_urut">
                                    @error('no_urut')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- <div class="form-group">
                                    <label for="foto_paslon">Upload Foto</label>
                                    <input type="file" class="form-control-file" id="foto_paslon" name="foto_paslon">
                                </div> --}}

                                <div class="form-group">
                                    <label for="foto_paslon">Upload Foto</label>
                                    <input type="file" class="form-control-file" id="foto_paslon" name="foto_paslon">
                                </div>

                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
