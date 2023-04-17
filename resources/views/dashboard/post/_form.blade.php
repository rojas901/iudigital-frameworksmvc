@csrf
{{-- form:post --}}
{{-- fila 1 --}}
<div class="row">
  {{-- row para crear una fila --}}
  <div class="form-group">
    <label for="name">Titulo</label>
    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $post->name) }}">
    <input class="form-control" name="autor_id" value="{{ Auth::user()->id }}" hidden>
  </div>
</div>

{{-- fila 2 --}}
<div class="row">
  <div class="form-group">
    <label for="description">Contenido</label>
    <textarea class="form-control" name="description" id="description" rows="10">{{ old('description', $post->description) }}</textarea>
  </div>      
</div>

<div class="form-group">
  <label for="category_id">Categorias</label>
  <select class="form-select" name="category_id" id="category_id" {{-- value="{{ old('category_id', $post->category_id) }}" --}}>
    @foreach ($categories as $category)
      <option value="{{ $category->id }}" {{ ($post->category_id) == $category->id ? 'selected' : null}}>{{ $category->name }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label for="state">State</label>
  <select class="form-select" name="state" id="state">
    {{-- <option value="{{ $post->state }}">Valor actual: {{ $post->state }}</option>
    <option value="post">post</option>
    <option value="no_post">no_post</option> --}}
    <option value="post" {{ ($post->state) == "post" ? 'selected' : null}}>post</option>
    <option value="no_post" {{ ($post->state) == "no_post" ? 'selected' : null}}>no_post</option>
  </select>
</div>

{{-- fila 3 --}}
<div class="row center mt-2">
  {{-- Las columnas en bootstrap tiene una ancho de 12
    Añadir 2 input en una fila: 12/cantidadInput --}}
  <div class="col s6">
    <button class="btn btn-success btn-sm bg-success" type="submit">Publicar</button>
    <a href="{{ route('post.index') }}" class="btn btn-primary btn-sm">Volver</a>
  </div>
</div>