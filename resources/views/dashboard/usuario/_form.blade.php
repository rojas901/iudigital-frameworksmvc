@csrf
{{-- form:post --}}
{{-- fila 1 --}}
<div class="row">
  {{-- row para crear una fila --}}
  <div class="form-group col-4">
    <label for="name">Nombre</label>
    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
  </div>

  <div class="form-group col-4">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
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
    <select class="form-control" name="roles" id="roles">
      <option value="">--Seleccione un rol--</option>
      @foreach ($roles as $rol)
        <option value="{{ $rol->name }}">{{ $rol->name }}</option>
      @endforeach
    </select>
  </div>
</div>

{{-- fila 3 --}}
<div class="row center mt-2">
  {{-- Las columnas en bootstrap tiene una ancho de 12
    Añadir 2 input en una fila: 12/cantidadInput --}}
  <div class="col s6">
    <button class="btn btn-success btn-sm bg-success" type="submit">Guardar</button>
    <a href="{{ route('usuario.index') }}" class="btn btn-primary btn-sm">Volver</a>
  </div>
</div>