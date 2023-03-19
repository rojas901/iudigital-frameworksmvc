@extends('dashboard.master')
@section('titulo', 'Poster')
@section('contenido')
  <h2>Post Publicados</h2>
  <a class="btn btn-success mt-3 mb-3" href="{{ route('post.create') }}">Crear</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Categoria</th>
        <th scope="col">Estado publicación</th>
        <th scope="col">Creación</th>
        <th scope="col">Actualización</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->name }}</td>
        <td>{{ $post->category->name}}</td>
        <td>{{ $post->state }}</td>
        <td>{{ $post->created_at }}</td>
        <td>{{ $post->updated_at }}</td>
        <td>
          <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary btn-sm" title="ver">👀</a>
          <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-sm" title="editar">✍️</a>

          {{-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{ $post->id }}" title="eliminar">✖️</button> --}}
          <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="{{ $post->id }}">✖️</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $posts->links() }}
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <form action="{{ route('post.destroy', 0) }}" method="post" id="deleteForm">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar</button>
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
      modalTitle.textContent = `Eliminar post con id ${recipient}`
      var deleteForm = exampleModal.querySelector('#deleteForm')
      deleteForm.setAttribute('action', `http://proyecto-test.test/dashboard/post/${recipient}`)
    })
  </script>
@endsection
