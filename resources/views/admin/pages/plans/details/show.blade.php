@extends('adminlte::page')

@section('title', "Detalhes do detalhe {$detail->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class='breadcrumb-item'><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class='breadcrumb-item'><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class='breadcrumb-item'><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class='breadcrumb-item'><a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a></li>
    <li class='breadcrumb-item active'><a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}">detalhe</a></li>
</ol>
    <h1>detalhes do detalhe {{ $detail->name }}</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
           <ul>
            <li>
                <strong>Nome:</strong> {{$detail->name}}
            </li>
           </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar o detalhe {{ $detail->name }}, do Plano {{$plan->name}} </button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop