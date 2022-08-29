@extends('adminlte::page')

@section('title', 'Editar o plano {{$profile->name}}')

@section('content_header')
    <h1>Editar o Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->id) }}" method="post" class="form">
                @csrf
                @method('PUT')

                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@stop
