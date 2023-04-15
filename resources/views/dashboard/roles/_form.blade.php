@csrf
{{-- form:post --}}
{{-- fila 1 --}}
<div class="row">
  {{-- row para crear una fila --}}
  <div class="form-group">
    <label for="name">Nombre</label>
    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
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
            <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permiso->id }}">
            {{ $permiso->name }}
          </td>
        </tr>          
        @endforeach
      </tbody>
    </table>
  </div>      
</div>

{{-- <div class="form-group">
  <label for="state">State</label>
  <select class="form-select" name="state" id="state">
    <option value="post" {{ ($post->state) == "post" ? 'selected' : null}}>post</option>
    <option value="no_post" {{ ($post->state) == "no_post" ? 'selected' : null}}>no_post</option>
  </select>
</div> --}}

{{-- <div class="form-group">
  <label for="category_id">Categorias</label>
  <select class="form-control" name="category_id" id="category_id">
    @foreach ($categories as $name => $id)
      <option {{ $post->category_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">{{ $name }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label for="state">State</label>
  <select class="form-control" name="state" id="state">
    @include('dashboard.partials.option-yes-not', ['val' => $post->state])
  </select>
</div> --}}

{{-- fila 3 --}}
<div class="row center mt-2">
  {{-- Las columnas en bootstrap tiene una ancho de 12
    Añadir 2 input en una fila: 12/cantidadInput --}}
  <div class="col s6">
    <button class="btn btn-success btn-sm bg-success" type="submit">Guardar</button>
    <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm">Volver</a>
  </div>
</div>
