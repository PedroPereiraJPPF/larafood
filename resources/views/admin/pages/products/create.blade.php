@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h1>Cadastrar novo produto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="post" class="form" enctype="multipart/form-data">
                @csrf

                @include('admin.pages.products._partials.form')
            </form>
        </div>
    </div>
@stop
