@extends('dashboard.master')
@section('titulo', 'Usuarios')
@section('contenido')
  <h2 class="text-xl">Usuarios Publicados</h2>
  @can('crear-usuarios')
  <a class="btn btn-success mt-3 mb-3" href="{{ route('usuario.create') }}">Crear</a>
  @endcan  
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">email</th>
        <th scope="col">Rol</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($usuarios as $usuario)
      <tr>
        <td>{{ $usuario->id }}</td>
        <td>{{ $usuario->name }}</td>
        <td>{{ $usuario->email }}</td>
        <td>
          @if(!empty($usuario->getRoleNames()))
                @foreach($usuario->getRoleNames() as $rolname)
                    <span class="badge rounded-pill bg-dark">{{ $rolname }}</span>
                @endforeach
            @endif
        </td>
        <td>
          @can('editar-usuarios')
          <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-primary btn-sm" title="editar">✍️</a>
          @endcan
          
          @can('borrar-usuarios')
          <button type="button" class="btn btn-danger btn-sm bg-red-500" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="{{ $usuario->id }}">✖️</button>
          @endcan
        </td>
      </tr>
      @empty
      <p>No hay usuarios</p>
      @endforelse
    </tbody>
  </table>
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
          <form action="{{ route('usuario.destroy', 0) }}" method="post" id="deleteForm">
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
      modalTitle.textContent = `Eliminar usuario con id ${recipient}`
      var deleteForm = exampleModal.querySelector('#deleteForm')
      deleteForm.setAttribute('action', `http://proyecto-test.test/dashboard/usuario/${recipient}`)
    })
  </script>
@endsection