@extends('adminlte::page')

@section('title', 'Permissões disponiveis do Perfil {{$product->name}}')

@section('content_header')
<ol class="breadcrumb">
    <li class='breadcrumb-item'><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class='breadcrumb-item active'><a href="{{ route('products.index') }}">Perfil</a></li>
</ol>
    <h1>Permissões dsiponiveis no perfil Add permissão</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-header'>
            <form action="" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="filtro" class = "form-control" value ="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class='card-body'>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('categories.attach', $product->id) }}" method="post">
                        @csrf
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                            </td>
                            <td>
                                {{ $category->name }}
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')
                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{-- @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif --}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
