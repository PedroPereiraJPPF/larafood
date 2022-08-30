@extends('adminlte::page')

@section('title', 'Editar a Permissão {{$permission->name}}')

@section('content_header')
    <h1>Editar a permissão</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" method="post" class="form">
                @csrf
                @method('PUT')

                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@stop
