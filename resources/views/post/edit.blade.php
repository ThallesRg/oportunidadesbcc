@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">
      Editar vaga
    </div>
    <div class="account-bdy p-3">
      <p class="text-primary mb-4">Preencha todos os campos para editar a vaga</p>
      <div class="row mb-3">
        <div class="col-sm-12 col-md-12">
          <form action="{{route('post.update',['post'=>$post])}}" id="postForm" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="">Titulo da vaga</label>
              <input type="text" placeholder="Titulo da vaga" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ $post->job_title }}" required autofocus >
              @error('job_title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Nivel</label>
                  <select name="job_level" class="form-control" value="{{$post->job_level}}" required>
                    <option value="Senior">Senior</option>
                    <option value="Pleno">Pleno</option>
                    <option value="Junior">Junior</option>
                    <option value="Estágio">Estágio</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="">Nº de vagas</label>
                  <input type="number" class="form-control @error('vacancy_count') is-invalid @enderror" name="vacancy_count" value="{{ $post->vacancy_count }}" required >
                  @error('vacancy_count')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div>
       

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Tipo da vaga</label>
                  <select name="employment_type" class="form-control" name="employment_type" value="{{$post->employment_type}}">
                    <option value="Integral">Integral</option>
                    <option value="Parcial">Parcial</option>
                    <option value="Freelance">Freelance</option>
                    <option value="Estágio">Estágio</option>
                    <option value="Treinee">Treinee</option>
                    <option value="Voluntário">Voluntário</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="">Link da vaga</label>
                  <input type="text" placeholder="https://www.meusite.com/vaga" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ $post->link }}" required autofocus >
                  @error('link')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="">Localização</label>
              <input type="text" placeholder="Localização" class="form-control @error('job_location') is-invalid @enderror" name="job_location" value="{{ $post->job_location }}" required >
              @error('job_location')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Salário (Mensal)</label>
                  <input type="text" placeholder="ex: 2000 - 5000" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ $post->salary }}" required >
                  @error('salary')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="">Prazo final</label>
                  <input type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="@php $date = new DateTime($post->deadline); echo date('Y-m-d',$date->getTimestamp());@endphp" required >
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Nivel de educação</label>
                  <select name="education_level" class="form-control" value="{{$post->education_level}}">
                    <option value="Bacharelado">Bacharelado</option>
                    <option value="Ensino médio">Ensino médio</option>
                    <option value="Mestrado">Mestrado</option>
                    <option value="Outros">Outros</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="">Experiencia</label>
                  <select name="experience" class="form-control" value="{{$post->experience}}">
                    <option value="Menos que 1 ano">Menos que 1 ano</option>
                    <option value="1 anos">1 ano</option>
                    <option value="2 anos">2 anos</option>
                    <option value="3 anos">3 anos</option>
                    <option value="Mais que 5 anos">Mais que 5 anos</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="">Habilidades <span class="text-info">( Se multiplos separatar com "," )</span></label>
              <input type="text" placeholder="Habilidade1,Habilidade2 etc" class="form-control @error('skills') is-invalid @enderror" name="skills" value="{{ $post->skills }}" required >
            </div>

            <div class="form-group">
              <label for="">Descrição da vaga (especificações) <small>Campo opcional</small></label>
              <input type="hidden" id="specifications" name="specifications" value="{{$post->specifications}}">
              <div id="quillEditor" style="height:200px"></div>
            </div>

            <button type="button" id="postBtn" class="btn primary-btn">Atualizar vaga</button>
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
  $(document).ready(function(){
    var quill = new Quill('#quillEditor', {
    modules: {
      toolbar: [
          [{ 'font': [] }, { 'size': [] }],
          ['bold', 'italic'],
          [{ list: 'ordered' }, { list: 'bullet' }],
          ['link', 'blockquote', 'code-block', 'image'],
        ]
      },
    placeholder: 'Requisitos do trabalho , Especificaçoes... etc ...',
    theme: 'snow'
    });
    

    const postBtn = document.querySelector('#postBtn');
    const postForm = document.querySelector('#postForm');
    const specifications = document.querySelector('#specifications');
    
    if(specifications.value){
      quill.root.innerHTML = specifications.value;
    }

    postBtn.addEventListener('click',function(e){
      e.preventDefault();
      specifications.value = quill.root.innerHTML
      
      postForm.submit();
    })
  })
</script>
@endpush