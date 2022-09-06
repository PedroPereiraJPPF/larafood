@extends('adminlte::page')

@section('title', 'Detalhjes da Categoria')

@section('content_header')
    <h1>Detalhes da Categoria {{ $category->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$category->name}}
                </li>
                <li>
                    <strong>Description: </strong> {{ $category->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">deletar o registro</button>
            </form>
        </div>
    </div>
@stop
