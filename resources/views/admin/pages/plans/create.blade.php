@extends('adminlte::page')

@section('title', 'Larafood')

@section('content_header')
    <h1>Cadastrar novo plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" method="post" class="form">
                @csrf
                
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@stop