@extends('layouts.account')

@section('content')
    <div class="account-layout border">
        <div class="account-hdr bg-primary text-white border">
            Editar intercâmbio
        </div>
        <div class="account-bdy p-3">
            <p class="text-primary mb-4">Preencha todos os campos para editar o intercâmbio</p>
            <div class="row mb-3">
                <div class="col-sm-12 col-md-12">
                    <form action="{{route('intercambios.update',['intercambio'=>$intercambio])}}" id="postForm" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" placeholder="Nome do intercâmbio"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name', $intercambio->name) }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <textarea type="text" placeholder="Descrição do intercâmbio"
                                class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"
                                required autofocus style="height: 200px;">{{ old('description', $intercambio->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Destino</label>
                            <input type="text" placeholder="Destino do intercâmbio"
                                class="form-control @error('destination') is-invalid @enderror" name="destination"
                                value="{{ old('destination', $intercambio->destination) }}" required>
                            @error('destination')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Vagas</label>
                            <input type="number" placeholder="Quantidade de vagas"
                                class="form-control @error('vacancies') is-invalid @enderror" name="vacancies"
                                value="{{ old('vacancies', $intercambio->vacancies) }}" required>
                            @error('vacancies')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Período de Inscrição</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" placeholder="Data de início"
                                        class="form-control @error('registration_period_start_date') is-invalid @enderror"
                                        name="registration_period_start_date"
                                        value="{{ old('vacancies', $intercambio->registration_period_start_date) }}" required>
                                    @error('registration_period_start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="date" placeholder="Data de término"
                                        class="form-control @error('registration_period_end_date') is-invalid @enderror"
                                        name="registration_period_end_date"
                                        value="{{ old('vacancies', $intercambio->registration_period_end_date) }}" required>
                                    @error('registration_period_end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Período de Intercâmbio</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" placeholder="Data de início"
                                        class="form-control @error('exchange_period_start_date') is-invalid @enderror"
                                        name="exchange_period_start_date" value="{{ old('vacancies', $intercambio->exchange_period_start_date) }}"
                                        required>
                                    @error('exchange_period_start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="date" placeholder="Data de término"
                                        class="form-control @error('exchange_period_end_date') is-invalid @enderror"
                                        name="exchange_period_end_date" value="{{ old('vacancies', $intercambio->exchange_period_end_date) }}"
                                        required>
                                    @error('exchange_period_end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Edital</label>
                            <input type="file" class="form-control @error('edital') is-invalid @enderror" name="edital" >
                            <a href="{{ asset($intercambio->edital) }}" style="text-decoration: underline; color: blue;" target="_blank">Baixar edital atual</a>
                            @error('edital')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Editar intercâmbio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

    @push('css')
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endpush

    @push('js')
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            $(document).ready(function() {
                var quill = new Quill('#quillEditor', {
                    modules: {
                        toolbar: [
                            [{
                                'font': []
                            }, {
                                'size': []
                            }],
                            ['bold', 'italic'],
                            [{
                                list: 'ordered'
                            }, {
                                list: 'bullet'
                            }],
                            ['link', 'blockquote', 'code-block', 'image'],
                        ]
                    },
                    placeholder: 'Requisitos do trabalho , Especificaçoes... etc ...',
                    theme: 'snow'
                });


                const postBtn = document.querySelector('#postBtn');
                const postForm = document.querySelector('#postForm');

                postBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    postForm.submit();
                })
            })
        </script>
    @endpush
