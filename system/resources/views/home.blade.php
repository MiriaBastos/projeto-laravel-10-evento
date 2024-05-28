@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div id="pesquisa-container">
                <h1 class="text-center roboto-bold laranja mb-5">Busque um evento</h1>
                <form action="/" method="GET">
                    <input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Procurar...">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div id="eventos-container">
                @if ($pesquisa)
                    <h2 class="roboto-bold laranja mt-5">Buscando por: <span class="laranja-escuro">{{$pesquisa}}</span></h2>
                    @else
                    <h2 class="roboto-bold laranja mt-5">Próximos Eventos</h2>
                    <p class="subtitulo roboto-medium-italic cinzaMedio size-18">Veja os eventos dos próximos dias</p>
                @endif
                <div id="cards-container" class="row mb-5">
                    @foreach($eventos as $evento)
                        <div class="card col-sm-3">
                            <img src="/img/eventos/{{ $evento->image }}" alt="{{ $evento->titulo }}" style="
                            border-radius: 10px 10px 0px 0px;">
                            <div class="card-body">
                                <p class="card-date roboto-bold cinza size-16">{{ date('d/m/Y', strtotime($evento->data)) }}</p>
                                <h5 class="card-title roboto-bold-italic size-20 laranja-escuro">{{ $evento->titulo }}</h5>
                                <p class="card-participantes roboto-light size-18 preto">{{ count($evento->users) }} Participantes</p>
                                <a href="/eventos/{{ $evento->id }}" class="btn btn-primary">Saber mais</a>
                            </div>
                        </div>
                    @endforeach
                    @if (count($eventos) == 0 && $pesquisa)
                        <p class="roboto-medium-italic laranja-escuro size-20">Não foi possível encontrar nenhum evento com "{{ $pesquisa }}". <a href="/">Ver todos os Eventos!</a></p>
                        @elseif (count($eventos) == 0)
                        <p class="roboto-medium-italic laranja-escuro size-20">Não há eventos disponivéis.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
