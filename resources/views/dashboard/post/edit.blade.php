{{-- Llamamos la vista de la cual heradamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'ActualizarPost')
@section('contenido')
@include('dashboard.partials.validation-error')
  <h2>Actualizar Post</h2>
  <form action="{{ route('post.update', $post->id) }}" method="post">
    @method('PUT')
    @include('dashboard.post._form')
  </form>
@endsection