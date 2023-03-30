{{-- Llamamos la vista de la cual heradamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'Actualizar Post')
@section('contenido')
@include('dashboard.partials.validation-error')
  <h2 class="text-xl">Actualizar Post</h2>
  <form action="{{ route('post.update', $post->id) }}" method="post">
    @method('PUT')
    @include('dashboard.post._form')
  </form>
@endsection