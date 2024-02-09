@extends('layouts.app')

@section('title', 'Edit Data Caleg')

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
                <h1>Data Dapil</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Dapil</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Petunjuk</h2>
                <p class="section-lead">Pilih terlebih dahulu Nama Kecamatan dan Dapil</p>


                        <div class="card">
                            <form action="{{ route('lokasi.update', $lokasi) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Masukkan Teks dan Angka</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nm_kec">Nama Kecamatan:</label>
                                    <select name="nm_kec" id="nm_kec" class="form-control">
                                        @foreach(['Pinogaluman','Kaidipang','Bolangitang Barat','Bolangitang Timur', 'Bintauna', 'Sangkub'] as $option)
                                            <option value="{{ $option }}" {{ $lokasi->nm_kec === $option ? 'selected' : '' }}>{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="dapil">Dapil:</label>
                                    <select name="dapil" id="dapil" class="form-control">
                                        @foreach(['DAPIL I','DAPIL II','DAPIL III',] as $option)
                                            <option value="{{ $option }}" {{ $lokasi->dapil === $option ? 'selected' : '' }}>{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="card-body">

                                <div class="form-group">
                                    <label>Nama Desa</label>
                                    <input type="text"
                                    class="form-control
                                    @error('nm_desa')
                                        is-invalid
                                    @enderror"
                                    name="nm_desa" value="{{ $lokasi->nm_desa }}">
                                    @error('nm_desa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Jumlah TPS (diisi dengan angka)</label>
                                    <input type="number"
                                    class="form-control
                                    @error('jlh_tps')
                                        is-invalid
                                    @enderror"
                                    name="jlh_tps" value="{{ $lokasi->jlh_tps }}">
                                    @error('jlh_tps')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Pemilih (diisi dengan angka)</label>
                                    <input type="number"
                                    class="form-control
                                    @error('jlh_pemilih')
                                        is-invalid
                                    @enderror"
                                    name="jlh_pemilih" value="{{ $lokasi->jlh_pemilih }}">
                                    @error('jlh_pemilih')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
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
