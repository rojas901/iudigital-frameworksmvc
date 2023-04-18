@extends('dashboard.master')
@section('titulo', 'Detalles Post')
@section('contenido')
@include('dashboard.partials.validation-error')
  <h2 class="text-xl">Detalles Post</h2>
  <div class="row">
    <div class="form-group">
      <label for="name">Titulo</label>
      <input readonly class="form-control" type="text" name="name" id="name" value="{{ $post->name }}">
    </div>
  </div>  
  
  <div class="row form-group">
    <div class="form-group">
      <label for="description">Contenido</label>
      <textarea readonly class="form-control" name="description" id="description" rows="5">{{ $post->description }}</textarea>
    </div>
  </div>
  
  <div class="row center mt-2">
    <div class="col s6">
      <a href="{{ route('post.index') }}" class="btn btn-primary btn-sm">Volver</a>
    </div>
  </div>

  <form action="{{ route('reply.store') }}" method="post" class="mt-4">
    @csrf
    <div class="row">
      <div class="form-group">
        <label for="text">Nueva respuesta</label>
        <input class="form-control" type="text" name="text" id="text" value="{{ old('text') }}">
        <input class="form-control" name="post_id" value="{{ $post->id }}" hidden>
      </div>
      <div class="col s6 mt-2">
        <button class="btn btn-success btn-sm bg-success" type="submit">Guardar</button>
      </div>
    </div> 
  </form>
  
  <h2 class="text-xl mt-2">Respuestas</h2>
  @foreach ($replys as $reply)
    @if ($reply->post_id == $post->id)
    <div class="row ml-2">
      <div class="bg-white border border-success mt-2 col-11">{{ $reply->text }}</div>
      <div class="col-1 mt-2">
        <a href="{{ route('reply.edit', $reply->id) }}" class="btn btn-primary btn-sm" title="editar">✍️</a>          
        <button type="button" class="btn btn-danger btn-sm bg-red-500" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="{{ $reply->id }}">✖️</button>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>¿Seguro que desea borrar el registro seleccionado?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary bg-secondary" data-bs-dismiss="modal">Cerrar</button>
            <form action="{{ route('reply.destroy', 0) }}" method="post" id="deleteForm">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger bg-red-500">Eliminar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      var exampleModal = document.getElementById('exampleModal')
      exampleModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var recipient = button.getAttribute('data-bs-id')
        var modalTitle = exampleModal.querySelector('.modal-title')
        modalTitle.textContent = `Eliminar respuesta con id ${recipient}`
        var deleteForm = exampleModal.querySelector('#deleteForm')
        deleteForm.setAttribute('action', `http://proyecto-test.test/dashboard/reply/${recipient}`)
      })
    </script>
    @endif
  @endforeach  
@endsection