@extends('adminlte::page')

@section('title', 'perfis do plano {{$plan->name}}')

@section('content_header')
<ol class="breadcrumb">
    <li class='breadcrumb-item'><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class='breadcrumb-item active'><a href="{{ route('profiles.index') }}">Perfil</a></li>
</ol>
    <h1>Perfis vinculados ao plano<a href="{{ route('plan.profiles.avaliable', $plan->id) }}" class='btn btn-dark'>Adicionar perfil</a></h1>
@stop

@section('content')
        <div class='card-body'>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->nome }}
                            </td>
                            <td style="width=10px">
                                <a href="{{ route('plan.profiles.detach', [$plan->id, $profile->id]) }}" class = 'btn btn-danger'>desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
