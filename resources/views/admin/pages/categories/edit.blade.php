@extends('adminlte::page')

@section('title', 'Editar a categoria {{$category->name}}')

@section('content_header')
    <h1>Editar a categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="post" class="form">
                @csrf
                @method('PUT')

                @include('admin.pages.categories._partials.form')
            </form>
        </div>
    </div>
@stop
