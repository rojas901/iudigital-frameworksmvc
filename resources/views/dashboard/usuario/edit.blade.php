{{-- Llamamos la vista de la cual heradamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'Actualizar Role')
@section('contenido')
@include('dashboard.partials.validation-error')
  <h2 class="text-xl">Actualizar Role</h2>
  <form action="{{ route('usuario.update', $user->id) }}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="form-group col-4">
        <label for="name">Nombre</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
      </div>
    
      <div class="form-group col-4">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}">
      </div>
    
      <div class="form-group col-4">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}">
      </div>  
    </div>
    
    <div class="row">
      <div class="form-group col-6">
        <label for="confirm-password">Confirmar password</label>
        <input class="form-control" type="password" name="confirm-password" id="confirm-password" value="{{ old('confirm-password') }}">
      </div>
      
      <div class="form-group col-6">
        <label for="roles">Roles</label>
        <select class="form-select" name="roles" id="category_id">
          @foreach ($roles as $rol)
            <option value="{{ $rol->name }}" {{ $userRole[0]['name'] == $rol->name ? 'selected' : null}}>{{ $rol->name }}</option>
          @endforeach
        </select>
      </div>
      {{-- <div class="form-group col-6">
        <label for="roles">Roles</label>
        <select class="form-control" name="roles" id="roles">
          <option value="">--Seleccione un rol--</option>
          @foreach ($roles as $rol)
            <option value="{{ $rol->name }}">{{ $rol->name }}</option>
          @endforeach
        </select>
      </div> --}}
    </div>
    
    <div class="row center mt-2">
      <div class="col s6">
        <button class="btn btn-success btn-sm bg-success" type="submit">Guardar</button>
        <a href="{{ route('usuario.index') }}" class="btn btn-primary btn-sm">Volver</a>
      </div>
    </div>
  </form>
@endsection