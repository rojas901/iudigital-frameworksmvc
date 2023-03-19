{{-- Llamamos la vista de la cual heradamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'ActualizarCategory')
@section('contenido')
@include('dashboard.partials.validation-error')
  <h2>Actualizar Category</h2>
  <form action="{{ route('category.update', $category->id) }}" method="post">
    @method('PUT')
    @include('dashboard.category._form')
  </form>
@endsection