@extends('layouts.post')

<style>
    .carousel-caption {
        display: flex;
        align-items: center;
    }

    hr {
        margin: 0 auto;
        width: 30%;
        border: 0;
        border-top: 3px solid rgba(0, 0, 0, 1);
    }
</style>

@section('content')
    <section class="home-page pt-4">
        <div class="container">
            <form action="{{ route('job.index') }}">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="px-4">
                            <div class="rounded-text">
                                <p>
                                    Busque oportunidades, vagas, carreiras.
                                </p>
                            </div>
                            <div class="home-search-bar">
                                <input type="text" name="q" placeholder="Busque Vagas Por Título"
                                    class="home-search-input form-control">
                                <button type="submit" class="secondary-btn"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="py-5 px-5 text-center">
                            <div class="text-light">
                                <h4>"Educação é a arma mais poderosa que você pode usar para mudar o mundo" </br> ~ Nelson
                                    Mandela
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    {{-- jobs list --}}
    <section class="jobs-section py-5">
        <div class="container-fluid px-0">
            <div class="row ">
                <div class="col-sm-12 col-md-7 ml-auto">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title font-weight-bold"><i class="fas fa-briefcase"></i> Últimas Vagas </p>
                        </div>
                        <div class="card-body">
                            <div class="top-jobs">
                                <div class="row">

                                    @foreach ($posts as $post)
                                        @if ($post->company)
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-sm-6 mb-sm-3">
                                                <a href="{{ route('post.show', ['job' => $post->id]) }}">
                                                    <div class="job-item border row h-100">
                                                        <div class="col-xs-3 col-sm-4 col-md-5">
                                                            <img src="{{ asset($post->company->logo) }}" alt="job listings"
                                                                class="img-fluid p-2">
                                                        </div>
                                                        <div class="job-description col-xs-9 col-sm-8 col-md-7">
                                                            <p class="company-name" title="{{ $post->company->title }}">
                                                                {{ $post->company->title }}</p>
                                                            <ul class="company-listings">
                                                                <li>•{{ substr($post->job_title, 0, 27) }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <a class="btn secondary-btn" href="{{ route('job.index') }}">Mostrar todas as vagas</a>
                    </div>
                </div>

                <div class="col-sm-12 col-md-3 mr-auto">

                    <div class="card mb-4">
                        <div class="card-header">
                            <p class="font-weight-bold"><i class="fas fa-building"></i> Top Empresas</p>
                        </div>
                        <div class="card-body">
                            <div class="top-employers">
                                @foreach ($topEmployers as $employer)
                                    <div class="top-employer">
                                        <a href="{{ route('account.employer', ['employer' => $employer]) }}">
                                            <img src="{{ asset($employer->logo) }}" width="60px" class="img-fluid"
                                                alt="">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 job-by-category">
                        <div class="card-header">
                            <p class="font-weight-bold"><i class="fab fa-typo3"></i> Vagas Por Categoria</p>
                        </div>
                        <div class="card-body">
                            <div class="jobs-category mb-3 mt-0">
                                @foreach ($categories as $category)
                                    <div class="hover-shadow p-1"><a
                                            href="{{ URL::to('search?category_id=' . $category->id) }}"
                                            class="text-muted">{{ $category->category_name }}</a> </div>
                                @endforeach
                                <a class="p-1 text-info" href="{{ route('job.index') }}">Mais..</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <a href="{{ route('scholarship.show', $ultimaBolsaDeEstudo->id) }}">
                    <div class="carousel-item active">
                        <img class="d-block w-100" style="height:300px; object-fit:cover"
                            src="https://i.pinimg.com/originals/cf/d3/cb/cfd3cb9042d6f1453ee2a4052a861a9d.jpg"
                            alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h4>Ultima bolsa de estudo</h5>
                                <hr
                                    style="margin-top: 1rem; margin-bottom: 1rem; border: 0; border-top: 3px solid rgba(0, 0, 0, 1); width: 30%;">
                                <br><br>
                                <h5>{{ $ultimaBolsaDeEstudo->name }}</h5>
                                <p>{{ $ultimaBolsaDeEstudo->description }}</p>
                        </div>
                </a>
            </div>
            <div class="carousel-item">
              <a href="{{ route('intercambios.show', $ultimoIntercambio->id) }}">
                <img class="d-block w-100" style="height:300px; object-fit:cover"
                    src="https://i.pinimg.com/originals/cf/d3/cb/cfd3cb9042d6f1453ee2a4052a861a9d.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Ultimo intercambio</h5>
                        <hr
                            style="margin-top: 1rem; margin-bottom: 1rem; border: 0; border-top: 3px solid rgba(0, 0, 0, 1); width: 30%;">
                        <br><br>
                        <h5>{{ $ultimoIntercambio->name }}</h5>
                        <p>{{ $ultimoIntercambio->description }}</p>
                </div>
              </a>
            </div>
            <div class="carousel-item">
              <a href="{{ route('events.show', $ultimoEvento->id) }}">
                <img class="d-block w-100" style="height:300px; object-fit:cover"
                    src="https://i.pinimg.com/originals/cf/d3/cb/cfd3cb9042d6f1453ee2a4052a861a9d.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4>Ultimo evento</h5>
                        <hr
                            style="margin-top: 1rem; margin-bottom: 1rem; border: 0; border-top: 3px solid rgba(0, 0, 0, 1); width: 30%;">
                        <br><br>
                        <h5>{{ $ultimoEvento->name }}</h5>
                        <p>{{ $ultimoEvento->description }}</p>
                </div>
              </a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </section>
@endsection
