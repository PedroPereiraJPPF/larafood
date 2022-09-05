@extends('adminlte::page')

@section('title', 'Editar o usuario {{$user->name}}')

@section('content_header')
    <h1>Editar usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="post" class="form">
                @csrf
                @method('PUT')

                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@stop
