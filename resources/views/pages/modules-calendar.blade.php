@extends('layouts.app')

@section('title', 'Quick Count')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/fullcalendar/dist/fullcalendar.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kalender</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Kalender</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Petunjuk</h2>
                <p class="section-lead">
                    Halaman ini menunjukan Kalender Nasional, tanpa ada Tanggal Merah.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Kalender</h4>
                            </div>
                            <div class="card-body">
                                <div class="fc-overflow">
                                    <div id="myEvent"></div>
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
    <script src="{{ asset('library/fullcalendar/dist/fullcalendar.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-calendar.js') }}"></script>
@endpush
