{{-- Llamamos la vista de la cual heradamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'Actualizar Category')
@section('contenido')
@include('dashboard.partials.validation-error')
  <h2 class="text-xl">Actualizar Category</h2>
  <form action="{{ route('category.update', $category->id) }}" method="post">
    @method('PUT')
    @include('dashboard.category._form')
  </form>
@endsection