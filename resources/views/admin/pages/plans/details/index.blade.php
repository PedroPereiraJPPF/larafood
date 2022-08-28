@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class='breadcrumb-item'><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class='breadcrumb-item'><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class='breadcrumb-item'><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class='breadcrumb-item active'><a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a></li>
</ol>
    <h1>Detalhes do plano {{ $plan->name }}<a href="{{ route('plans.create') }}" class='btn btn-dark'>Add</a></h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-header'>
            <form action="{{ route('plans.search')}}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="nome" class = "form-control" value ="{{ $filters['filter'] ?? '' }}"> 
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
            
        </div>
        <div class='card-body'>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>nome</th>
                        <th style="width = 50px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>
                                {{ $detail->name }}
                            </td>
                            <td>
                                R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </td>
                            <td style="width=10px">
                                <a href="{{ route('plans.edit', $plan->url) }}" class = 'btn btn-info'>Edit</a>
                                <a href="{{ route('plans.show', $plan->url) }}" class='btn btn-warning'>Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop