@extends('dashboard.master')
@section('titulo', 'DetallesPost')
@section('contenido')
  <h2>Detalles Post</h2>
  <div class="row">
    <div class="form-group">
      <label for="name">Titulo</label>
      <input readonly class="form-control" type="text" name="name" id="name" value="{{ $post->name }}">
    </div>
  </div>  
  
  <div class="row form-group">
    <div class="form-group">
      <label for="description">Contenido</label>
      <textarea readonly class="form-control" name="description" id="description" rows="10">{{ $post->description }}</textarea>
    </div>
  </div>
  
  <div class="row center mt-2">
    <div class="col s6">
      <a href="{{ route('post.index') }}" class="btn btn-primary btn-sm">Volver</a>
    </div>
  </div>
@endsection