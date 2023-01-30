@extends('layouts.account')

@section('content')
    <div class="account-layout  border">
        <div class="account-hdr bg-primary text-white border">
            Seção autor
        </div>
        <div class="account-bdy p-3">
            <div class="row mb-3">
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card dashboard-card text-white h-100 shadow">
                        <div class="card-body primary-bg">
                            <div class="rotate">
                                <i class="fas fa-users fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Minhas vagas de emprego:</h6>
                            <h1 class="">{{ $company ? $company->posts->count() : 0 }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card dashboard-card text-white h-100 shadow">
                        <div class="card-body primary-bg">
                            <div class="rotate">
                                <i class="fas fa-users fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Minhas bolsas de estudo:</h6>
                            <h1 class="">{{ $scholarships ? $scholarships->count() : 0 }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card dashboard-card text-white h-100 shadow">
                        <div class="card-body primary-bg">
                            <div class="rotate">
                                <i class="fas fa-users fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Minhas vagas de intercambio:</h6>
                            <h1 class="">{{ $intercambios ? $intercambios->count() : 0 }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card dashboard-card text-white h-100 shadow">
                        <div class="card-body primary-bg">
                            <div class="rotate">
                                <i class="fas fa-users fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Minhas vagas para eventos:</h6>
                            <h1 class="">{{ $events ? $events->count() : 0 }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="author-company-info">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Gerenciar detalhes da empresa</h4>

                                <div class="mb-3 d-flex">
                                    @if (!$company)
                                        <a href="{{ route('company.create') }}" class="btn primary-btn mr-2">Criar
                                            empresa</a>
                                    @else
                                        <a href="{{ route('company.edit') }}" class="btn secondary-btn mr-2">Editar
                                            empresa</a>
                                        <div class="ml-auto">
                                            <form action="{{ route('company.destroy') }}" id="companyDestroyForm"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" id="companyDestroyBtn" class="btn danger-btn">Deletar
                                                    empresa</a>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                @if ($company)
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <img src="{{ asset($company->logo) }}" width="100px"
                                                        class="img-fluid border p-2" alt="">
                                                    <h5>{{ $company->title }}</h5>
                                                    <small>{{ $company->getCategory->category_name }}</small>
                                                    <a class="d-block" href="{{ $company->website }}"><i
                                                            class="fas fa-globe"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="author-posts">
                <div class="row my-4">
                    <div class="col-lg-12 col-md-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Gerenciar vagas de emprego</h4>
                                <a href="{{ route('post.create') }}" class="btn primary-btn">Criar vaga</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Titulo</th>
                                        <th>Nivel</th>
                                        <th>Nº de vagas</th>
                                        <th>Deadline</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($company)
                                        @foreach ($company->posts as $index => $post)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td> <a href="{{ route('post.show', ['job' => $post]) }}" target="_blank"
                                                        title="Go to this post">{{ $post->job_title }}</a></td>
                                                <td>{{ $post->job_level }}</td>
                                                <td>{{ $post->vacancy_count }}</td>
                                                @if($post->remainingDays() > 0)
                                                    <td>{{date('d/m/Y',strtotime($post->deadline))}} <br> 
                                                        <span class='text-danger'> {{$post->remainingDays()}} dias restantes </span> 
                                                    </td>
                                                @else
                                                    <td>{{date('d/m/Y',strtotime($post->deadline))}} <br> 
                                                        <span class='text-danger'> Esta vaga expirou </span> 
                                                    </td>
                                                @endif
                                                 <td>
                                                    <a href="{{ route('post.edit', ['post' => $post]) }}"
                                                        class="btn primary-btn">Editar</a>
                                                    <form action="{{ route('post.destroy', ['post' => $post->id]) }}"
                                                        class="d-inline-block" id="delPostForm" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" id="delPostBtn"
                                                            class="btn danger-btn">Deletar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>Você não criou nenhuma empresa ainda.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <section class="author-posts">
                <div class="row my-4">
                    <div class="col-lg-12 col-md-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Gerenciar bolsas de estudo</h4>
                                <a href="{{ route('scholarships.create') }}" class="btn primary-btn">Criar bolsa</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Início</th>
                                        <th>Término</th>
                                        <th>Valor</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($scholarships)
                                        @foreach ($scholarships as $index => $scholarship)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $scholarship->name }}</td>
                                                <td>{{ $scholarship->start_date }}</td>
                                                <td>{{ $scholarship->end_date }}</td>
                                                <td>{{ $scholarship->value }}</td>
                                                <td class='d-flex justify-content-center'>
                                                    <a href="{{ route('scholarships.edit', ['scholarship' => $scholarship]) }}"
                                                        class="btn primary-btn d-inline-block mr-2">Editar</a>
                                                    <form
                                                        action="{{ route('scholarships.destroy', ['scholarship' => $scholarship]) }}"
                                                        class="d-inline-block" id="delScholarshipForm" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" id="delScholarshipBtn"
                                                            class="btn danger-btn">Deletar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>Você não criou nenhuma bolsa ainda.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <section class="author-posts">
                <div class="row my-4">
                    <div class="col-lg-12 col-md-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Gerenciar intercâmbios</h4>
                                <a href="{{ route('intercambios.create') }}" class="btn primary-btn">Criar
                                    intercâmbio</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Período de inscrição</th>
                                        <th>Período de intercâmbio</th>
                                        <th>Destino</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($intercambios)
                                        @foreach ($intercambios as $index => $intercambio)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $intercambio->name }}</td>
                                                <td>{{ $intercambio->registration_period_start_date }} a
                                                    {{ $intercambio->registration_period_end_date }}</td>
                                                <td>{{ $intercambio->exchange_period_start_date }} a
                                                    {{ $intercambio->exchange_period_end_date }}</td>
                                                <td>{{ $intercambio->destination }}</td>
                                                <td class='d-flex justify-content-center'>
                                                    <a href="{{ route('intercambios.edit', ['intercambio' => $intercambio]) }}"
                                                        class="btn primary-btn d-inline-block mr-2">Editar</a>
                                                    <form
                                                        action="{{ route('intercambios.destroy', ['intercambio' => $intercambio]) }}"
                                                        class="d-inline-block" id="delIntercambioForm" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" id="delIntercambioBtn"
                                                            class="btn danger-btn d-inline-block">Deletar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>Você não criou nenhum intercâmbio ainda.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <section class="author-posts">
                <div class="row my-4">
                    <div class="col-lg-12 col-md-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Gerenciar eventos</h4>
                                <a href="{{ route('events.create') }}" class="btn primary-btn">Criar evento</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Local</th>
                                        <th>Data de início</th>
                                        <th>Data de fim</th>
                                        <th>Website</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($events)
                                        @foreach ($events as $index => $event)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $event->name }}</td>
                                                <td>{{ $event->location }}</td>
                                                <td>{{ $event->start_date }}</td>
                                                <td>{{ $event->end_date }}</td>
                                                <td>{{ $event->website }}</td>
                                                <td class='d-flex justify-content-center'>
                                                    <a href="{{ route('events.edit', ['event' => $event]) }}"
                                                        class="btn primary-btn d-inline-block mr-2">Editar</a>
                                                    <form action="{{ route('events.destroy', ['event' => $event]) }}"
                                                        class="d-inline-block" id="delEventForm" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" id="delEventBtn"
                                                            class="btn danger-btn d-inline-block">Deletar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>Você não criou nenhum evento ainda.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endSection

@push('js')
    <script>
        $(document).ready(function() {
            //delete author company
            $('#companyDestroyBtn').click(function(e) {
                e.preventDefault();
                if (window.confirm('Tem certeza que deseja deletar a empresa e todas as suas vagas?')) {
                    $('#companyDestroyForm').submit();
                }
            })
        })
    </script>
@endpush
