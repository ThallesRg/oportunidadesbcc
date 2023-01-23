@extends('layouts.post')

@section('content')
    <div class="container mt-3">
        <div class="row">
            @foreach ($intercambios as $intercambio)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $intercambio->name }}</h5>
                            <p class="card-text">{{ Str::limit($intercambio->description, 80) }}</p>
                            <p class="card-text">
                                <small class="text-muted">Período de Inscrição: {{ $intercambio->registration_period_start_date }} - {{ $intercambio->registration_period_end_date }}</small>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Período de Intercâmbio: {{ $intercambio->exchange_period_start_date }} - {{ $intercambio->exchange_period_end_date }}</small>
                            </p>
                            <p class="card-text">Destino: {{ $intercambio->destination }}</p>
                            <p class="card-text">Vagas: {{ $intercambio->vacancies }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('intercambios.show', $intercambio->id) }}" class="btn btn-primary">Ver
                                Detalhes</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


@push('css')
    <style>
        .company-banner {
            min-height: 20vh;
            position: relative;
            overflow: hidden;
        }

        .company-banner-img {
            width: 100%;
            height: auto;
            overflow: hidden;
        }

        .banner-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, .3));
            width: 100%;
            height: 200px;
        }

        .company-website {
            position: absolute;
            right: 20px;
            bottom: 20px;
            color: white;
        }

        .company-media {
            position: absolute;
            display: flex;
            align-items: center;
            left: 2rem;
            bottom: 1rem;
            color: #333;
            padding-right: 2rem;
            background-color: rgba(255, 255, 255, .8);
        }

        .company-logo {
            max-width: 100px;
            height: auto;
            margin-right: 1rem;
            padding: 1rem;
            background-color: white;
        }

        .company-category {
            font-size: 1.3rem;
        }

        .company-link:hover {
            color: #ddd;
        }

        .job-title {
            font-size: 1.3rem;
            font-weight: bold;
        }

        .job-hdr {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(to right, #e1edf7, #EDF2F7)
        }

        .job-item {
            margin-bottom: .5rem;
            padding: .5rem 0;
        }

        .job-item:hover {
            background-color: #eee;
        }
    </style>
@endpush

@push('js')
@endpush
