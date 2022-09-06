@extends('adminlte::page')

@section('title', 'categories')

@section('content_header')
<ol class="breadcrumb">
    <li class='breadcrumb-item'><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class='breadcrumb-item active'><a href="{{ route('categories.index') }}">categories</a></li>
</ol>
    <h1>categories <a href="{{ route('categories.create') }}" class='btn btn-dark'>Add</a></h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-header'>
            <form action="{{ route('categories.search')}}" method="post" class="form form-inline">
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
                        <th>descrição</th>
                        <th style="width = 50px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                                {{ $category->description }}
                            </td>
                            <td style="width=10px">
                                <a href="{{ route('categories.edit', $category->id) }}" class = 'btn btn-info'>Edit</a>
                                <a href="{{ route('categories.show', $category->id) }}" class='btn btn-warning'>Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
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
