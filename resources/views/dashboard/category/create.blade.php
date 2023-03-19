{{-- Llamamos la vista de la cual heradamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'AgregarCategory')
@section('contenido')
@include('dashboard.partials.validation-error')
  <h2>Registrar Category</h2>
  <form action="{{ route('category.store') }}" method="post">
    @include('dashboard.category._form')
  </form>
@endsection