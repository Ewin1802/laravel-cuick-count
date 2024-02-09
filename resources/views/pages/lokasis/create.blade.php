@extends('layouts.app')

@section('title', 'Form Tambah Lokasi')

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
                            <form action="{{ route('lokasi.store') }}" method="POST">

                                @csrf
                                {{-- <div class="form-group">
                                    <label for="nama_partai">Nomor Partai</label>
                                    <select name="nama_partai" class="form-control">
                                        @foreach ($nm_partai as $number)
                                            <option value="{{$number['nama_partai']}}">{{$number['nm_partai']}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label for="nm_kec">Pilih Kecamatan:</label>
                                    <select name="nm_kec" id="nm_kec" class="form-control">
                                        @foreach(['Pinogaluman','Kaidipang','Bolangitang Barat','Bolangitang Timur', 'Bintauna', 'Sangkub'] as $option)
                                            <option value="{{ $option }}" {{  $option ? 'selected' : '' }}>{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="dapil">Pilih Dapil:</label>
                                    <select name="dapil" id="dapil" class="form-control">
                                        @foreach(['DAPIL I','DAPIL II','DAPIL III'] as $option)
                                            <option value="{{ $option }}" {{  $option ? 'selected' : '' }}>{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Desa</label>
                                    <input type="text"
                                    class="form-control
                                    @error('nm_desa')
                                        is-invalid
                                    @enderror"
                                    name="nm_desa">
                                    @error('nm_desa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Jumlah TPS</label>
                                    <input type="number"
                                    class="form-control
                                    @error('jlh_tps')
                                        is-invalid
                                    @enderror"
                                    name="jlh_tps">
                                    @error('jlh_tps')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Pemilih</label>
                                    <input type="number"
                                    class="form-control
                                    @error('jlh_pemilih')
                                        is-invalid
                                    @enderror"
                                    name="jlh_pemilih">
                                    @error('jlh_pemilih')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
