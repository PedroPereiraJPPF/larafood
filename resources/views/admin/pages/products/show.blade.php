@extends('adminlte::page')

@section('title', 'Detalhes do produto')

@section('content_header')
    <h1>Detalhes do produto {{ $product->title }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
                <img src=" {{ url("storage/{$product->image}") }} " alt="{{ $product->title }}" style="max-width: 150px">
            <ul>
                <li>
                    <strong>Titulo: </strong> {{$product->title}}
                </li>
                <li>
                    <strong>Description: </strong> {{ $product->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">deletar o registro</button>
            </form>
        </div>
    </div>
@stop
