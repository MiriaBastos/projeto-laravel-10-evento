@extends('layouts.main')

@section('title', $evento->title)

@section('content')

<div class="col-md-10 offset-md-1 mt-5">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/eventos/{{ $evento->image }}" class="img-fluid" alt="{{ $evento->titulo }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1 class="roboto-bold laranja-escuro">{{ $evento->titulo }}</h1>
            <p class="evento-cidade"><ion-icon name="location-outline"></ion-icon> {{ $evento->cidade }}</p>
            <p class="eventos-participantes"><ion-icon name="people-outline"></ion-icon> {{ count($evento->users) }} Participantes</p>
            <p class="evento-owner"><ion-icon name="star-outline"></ion-icon> {{$eventoProprietario['name']}}</p>
            <form action="/eventos/join/{{ $evento->id }}" method="POST">
                @csrf
                <a href="/eventos/join/{{ $evento->id }}" class="btn btn-primary"
                    id="evento-submit"
                    onclick="evento.preventDefault();
                    this.closest('form').submit();">
                    Confirmar Presença
                </a>
            </form>
            <h3 class="roboto-medium-italic cinzaMedio size-24">O evento conta com:</h3>
            <ul id="items-list">
                @foreach ($evento->items as $items )
                    <li><ion-icon name="play-outline"></ion-icon> <span>{{ $items }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12 mb-5" id="description-container">
            <h3 class="mt-3 roboto-medium-italic cinzaMedio size-24">Sobre o evento:</h3>
            <p class="evento-descricao preto roboto-bold size-18">{{ $evento->descricao }}</p>
        </div>
    </div>
</div>

@endsection
