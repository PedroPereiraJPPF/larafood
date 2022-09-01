@extends('adminlte::page')

@section('title', 'Permissões do Perfil {{$profile->name}}')

@section('content_header')
<ol class="breadcrumb">
    <li class='breadcrumb-item'><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class='breadcrumb-item active'><a href="{{ route('profiles.index') }}">Perfil</a></li>
</ol>
    <h1>Perfis vinculados a {{$permissions->name}}</h1>
@stop

@section('content')
        <div class='card-body'>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>Perfis</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                <h3>{{ $profile->nome }}</h3>
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
