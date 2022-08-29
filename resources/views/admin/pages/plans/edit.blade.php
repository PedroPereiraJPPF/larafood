@extends('adminlte::page')

@section('title', 'Editar o plano {{$plan->name}}')

@section('content_header')
    <h1>Editar plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" method="post" class="form">
                @csrf
                @method('PUT')

                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@stop
