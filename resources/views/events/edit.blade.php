@extends('layouts.account')

@section('content')
    <div class="account-layout border">
        <div class="account-hdr bg-primary text-white border">
            Editar evento
        </div>
        <div class="account-bdy p-3">
            <p class="text-primary mb-4">Edite os campos desejados</p>
            <div class="row mb-3">
                <div class="col-sm-12 col-md-12">
                    <form action="{{ route('events.update', $event->id) }}" id="postForm" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" placeholder="Nome do evento"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') ? old('name') : $event->name }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <textarea type="text" placeholder="Descrição do evento"
                                class="form-control @error('description') is-invalid @enderror" name="description" required autofocus
                                style="height: 200px;">{{ old('description') ? old('description') : $event->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Local</label>
                            <input type="text" placeholder="Local do evento"
                                class="form-control @error('location') is-invalid @enderror" name="location"
                                value="{{ old('location') ? old('location') : $event->location }}" required>
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Data de Início</label>
                            <input type="date" placeholder="Data de início"
                                class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                                value="{{ old('start_date') ? old('start_date') : $event->start_date }}"
                                required>
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Data de Fim</label>
                            <input type="date" placeholder="Data de fim"
                                class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                                value="{{ old('end_date') ? old('end_date') : $event->end_date }}" required>
                            @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" placeholder="https://meusite.com"
                                class="form-control @error('website') is-invalid @enderror" name="website"
                                value="{{ old('website') ? old('website') : $event->website }}">
                            @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Editar evento</button>
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
