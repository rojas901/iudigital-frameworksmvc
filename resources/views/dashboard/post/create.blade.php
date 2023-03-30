{{-- Llamamos la vista de la cual heradamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'Registrar Post')
@section('contenido')
@include('dashboard.partials.validation-error')
  <h2 class="text-xl">Registrar Post</h2>
  <form action="{{ route('post.store') }}" method="post">
    @include('dashboard.post._form')
  </form>
@endsection