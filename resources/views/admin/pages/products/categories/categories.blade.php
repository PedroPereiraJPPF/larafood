@extends('adminlte::page')

@section('title', 'Permissões do Perfil {{$categories->name}}')

@section('content_header')
<ol class="breadcrumb">
    <li class='breadcrumb-item'><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class='breadcrumb-item active'><a href="{{ route('categories.index') }}">categoria</a></li>
</ol>
    <h1>categorias vinculadas a {{$product->title}}</h1> <a href="{{ route('categories.avaliable', $product->id) }}"><button class='btn btn-danger'>adicionar</button></a>
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                <h3>{{ $category->name }}</h3>
                            </td>
                            <td>
                                <a href="{{ route('categories.detach', [$product->id, $category->id]) }}"><button class="btn btn-danger">remover</button></a>
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
