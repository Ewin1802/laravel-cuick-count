@extends('layouts.app')

@section('title', 'Grafik')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Grafik</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Grafik</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Grafik</h2>
                <p class="section-lead">
                   Grafik Makanan yang diminati hari ini.
                </p>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Nasi Kuning</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Nasi Jaha</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Donat Hamis</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart3"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Panada isi Batu</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart4"></canvas>
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
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-chartjs.js') }}"></script>
@endpush
