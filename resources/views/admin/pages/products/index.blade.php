@extends('adminlte::page')

@section('title', 'product')

@section('content_header')
<ol class="breadcrumb">
    <li class='breadcrumb-item'><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class='breadcrumb-item active'><a href="{{ route('products.index') }}">product</a></li>
</ol>
    <h1>product <a href="{{ route('products.create') }}" class='btn btn-dark'>Add</a></h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-header'>
            <form action="{{ route('products.search')}}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="title" class = "form-control" value ="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>

        </div>
        <div class='card-body'>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>imagem</th>
                        <th>titulo</th>
                        <th>flag</th>
                        <th>description</th>
                        <th style="width = 50px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <img src=" {{ url("storage/{$product->image}") }} " alt="{{ $product->title }}" style="max-width: 150px">
                            </td>
                            <td>
                               <strong>titulo: </strong> {{ $product->title }}
                            </td>
                            <td>
                                <strong>flag: </strong> {{ $product->title }}
                             </td>
                            <td style="width=10px">
                                <a href="{{ route('products.edit', $product->id) }}" class = 'btn btn-info'>Edit</a>
                                <a href="{{ route('products.show', $product->id) }}" class='btn btn-warning'>Ver</a>
                                <a href="{{ route('product.categories', $product->id) }}" class='btn btn-warning'>categorias</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $products->appends($filters)->links() !!}
            @else
                {!! $products->links() !!}
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
