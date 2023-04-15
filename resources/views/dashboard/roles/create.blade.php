{{-- Llamamos la vista de la cual heradamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'Registrar Role')
@section('contenido')
@include('dashboard.partials.validation-error')
  <h2 class="text-xl">Registrar Role</h2>
  <form action="{{ route('roles.store') }}" method="post">
    @include('dashboard.roles._form')
  </form>
@endsection