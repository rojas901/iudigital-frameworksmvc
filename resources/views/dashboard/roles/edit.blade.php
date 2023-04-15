{{-- Llamamos la vista de la cual heradamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'Actualizar Role')
@section('contenido')
@include('dashboard.partials.validation-error')
  <h2 class="text-xl">Actualizar Role</h2>
  <form action="{{ route('roles.update', $role->id) }}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
      {{-- row para crear una fila --}}
      <div class="form-group">
        <label for="name">Nombre</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ $role->name }}">
      </div>
    </div>
    
    {{-- fila 2 --}}
    <div class="row">
      <div class="form-group">
        <label for="name">Permisos</label>
        <table>
          <tbody>
            @foreach ($permission as $permiso)
            <tr>
              <td>
                <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permiso->id }}" {{ $role->permissions->contains($permiso->id) ? "checked" : ""}}>
                {{ $permiso->name }}
              </td>
            </tr>          
            @endforeach
          </tbody>
        </table>
      </div>      
    </div>    
    
    
    {{-- fila 3 --}}
    <div class="row center mt-2">
      {{-- Las columnas en bootstrap tiene una ancho de 12
        Añadir 2 input en una fila: 12/cantidadInput --}}
      <div class="col s6">
        <button class="btn btn-success btn-sm bg-success" type="submit">Guardar</button>
        <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm">Volver</a>
      </div>
    </div>
  </form>
@endsection