@extends('adminlte::page')

@section('title', 'Detalhjes do plano')

@section('content_header')
    <h1>Detalhes do perfil {{ $profile->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$profile->nome}}
                </li>
                <li>
                    <strong>Descrição: </strong>{{  $profile->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">deletar o perfil{{$profile->nome}}</button>
            </form>
        </div>
    </div>
@stop
