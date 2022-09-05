@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
<ol class="breadcrumb">
    <li class='breadcrumb-item'><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class='breadcrumb-item active'><a href="{{ route('users.index') }}">Users</a></li>
</ol>
    <h1>Users <a href="{{ route('users.create') }}" class='btn btn-dark'>Add</a></h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-header'>
            <form action="{{ route('users.search')}}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="nome" class = "form-control" value ="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>

        </div>
        <div class='card-body'>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>head</th>
                        <th>E-mail</th>
                        <th style="width = 50px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td style="width=10px">
                                <a href="{{ route('users.edit', $user->id) }}" class = 'btn btn-info'>Edit</a>
                                <a href="{{ route('users.show', $user->id) }}" class='btn btn-warning'>Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $users->appends($filters)->links() !!}
            @else
                {!! $users->links() !!}
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
