@extends('layouts.account')

@section('content')
    <div class="account-layout border">
        <div class="account-hdr bg-primary text-white border">
            Criar bolsa de estudo
        </div>
        <div class="account-bdy p-3">
            <p class="text-primary mb-4">Preencha todos os campos para criar uma bolsa de estudo</p>
            <div class="row mb-3">
                <div class="col-sm-12 col-md-12">
                    <form action="{{ route('scholarships.store') }}" id="postForm" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" placeholder="Nome da bolsa de estudo"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <textarea type="text" placeholder="Descrição da bolsa de estudo"
                                class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"
                                required autofocus></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Data de início</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        name="start_date" value="{{ old('start_date') }}" required>
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Data de término</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        name="end_date" value="{{ old('end_date') }}" required>
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Valor</label>
                            <input type="text" placeholder="Valor da bolsa de estudo"
                                class="form-control @error('value') is-invalid @enderror" name="value"
                                value="{{ old('value') }}" required>
                            @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="button" id="postBtn" class="btn primary-btn">Criar bolsa</button>
                        <a href="{{route('account.authorSection')}}" class="btn danger-btn">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endSection

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
