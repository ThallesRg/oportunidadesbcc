@extends('layouts.post')

@section('content')
<section class="show-page pt-4 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-8">
        <div class="job-listing border">
          <div class="company-info">
            <div class="company-banner">
              <div class="banner-overlay"></div>
              <img src="{{asset('images/companies/nocover.jpg')}}" class="company-banner-img img-fluid" alt="">
              <div class="company-media">
                <img src="{{asset($company->logo)}}" alt="" class="company-logo">
                <div>
                  <a href="{{route('account.employer',['employer'=>$company])}}" class="secondary-link">
                    <p class="font-weight-bold">{{$company->title}}</p>
                    <p class="company-category">{{$company->getCategory->category_name}}</p>
                  </a>
                </div>
              </div>
              <div class="company-website">
                <a href="{{$company->website}}" target="_blank"><i class="fas fa-globe"></i></a>
              </div>
            </div>

            {{-- company information --}}
            <div class="p-3">
              <p>{{$company->description}}</p>
            </div>
          </div>

          {{-- job information --}}
          <div class="job-info">
            <div class="job-hdr p-3">
              <p class="job-title">{{$post->job_title}}</p>
              <div class="">
                <p class="job-views">
                  @if($post->remainingDays() > 0)
                    <span class="text-danger">Se candidate em até: {{$post->remainingDays()}} dia(s)</span>
                  @else
                    <span class="text-danger">Esta vaga expirou</span>
                  @endif
                </p>
              </div>
            </div>
            <div class="job-bdy p-3 my-3">
              <div class="job-level-description">
                <p class="font-weight-bold">Descrição da vaga</p>
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td width="33%">Categoria</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$company->getCategory->category_name}}</td>
                    </tr>
                    <tr>
                      <td width="33%">Nível</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$post->job_level}}</td>
                    </tr>
                    <tr>
                      <td width="33%">Nº de vagas</td>
                      <td width="3%">:</td>
                      <td width="64%">[ <strong>{{$post->vacancy_count}}</strong> ]</td>
                    </tr>
                    <tr>
                      <td width="33%">Tipo da vaga</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$post->employment_type}}</td>
                    </tr>
                    <tr>
                      <td width="33%">Salário (Mensal)</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$post->salary}}</td>
                    </tr>
                    <tr>
                      <td width="33%">Aplique até</td>
                      <td width="3%">:</td>
                      @if($post->remainingDays() > 0)
                        <td width="64%" class="text-danger">{{date('d/m/Y',strtotime($post->deadline))}} - {{$post->remainingDays()}} dia(s) restantes</td>
                      @else
                        <td width="64%" class="text-danger">Esta vaga expirou</td>
                      @endif
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="job-level-description">
                <p class="font-weight-bold">Especificações da vaga</p>
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td width="33%">Nível educacional</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$post->education_level}}</td>
                    </tr>
                    <tr>
                      <td width="33%">Experiência necessária</td>
                      <td width="3%">:</td>
                      <td width="64%">{{$post->experience}}</td>
                    </tr>
                    <tr>
                      <td width="33%">Habilidades requeridas</td>
                      <td width="3%">:</td>
                      <td width="64%">
                        @foreach($post->getSkills() as $skill)
                        <span class="badge badge-primary">{{$skill}}</span>
                        @endforeach
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="job-level-description">
                <p class="font-weight-bold">Mais Detalhes</p>
                <p class="py-2">{!!$post->specifications!!}</p>
              </div>
              <br>
              <hr>
              <div class="d-flex justify-content-end">
                <div>
                  <a href="{{$post->link}}" class="btn primary-btn">Aplicar agora</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-4">
        <div class="card d-none d-md-block mb-3">
          <div class="card-header">
            Vaga
          </div>
          <div class="card-body">
            <div class="btn-group w-100">
              <a href="{{$post->link}}" class="btn primary-outline-btn float-left">Aplicar para vaga</a>
            </div>
          </div>
        </div>
        <div class="card ">
          <div class="card-header">
            Vagas relacionadas
          </div>
          <div class="card-body">
            <div class="similar-jobs">
              @foreach ($similarJobs as $job)
              @if($similarJobs)
                <div class="job-item border-bottom row">
                  <div class="col-4">
                    <img src="{{asset($job->company->logo)}}" class="company-logo" alt="">
                  </div>
                  <div class="job-desc col-8">
                    <a href="{{route('post.show',['job'=>$job->id])}}" class="job-category text-muted font-weight-bold">
                      <p class="text-muted h6">{{$job->job_title}}</p>
                      <p class="small">{{$job->company->title}}</p>
                      <p class="font-weight-normal small text-danger">Tempo restante: {{$job->remainingDays()}} dia(s)</p>
                    </a>
                  </div>
                </div>
                @else
                <div class="card">
                  <div class="card-header">
                    <p>Sem vagas similares disponíveis no momento</p>
                  </div>
                </div>
                @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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
    background-color:rgba(255,255,255,.8);
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

  .job-item{
    margin-bottom: .5rem;
    padding:.5rem 0;
  }
  .job-item:hover {
    background-color:#eee;
  } 

</style>
@endpush

@push('js')

@endpush