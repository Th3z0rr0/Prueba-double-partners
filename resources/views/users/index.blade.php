@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="text-center mt-3">Listado de Usuarios</h3>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo Usuario</a>
        <table class="table mt-3">
            <thead class="table-dark">
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->_id }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                        <th>{{ $user->phone }}</th>
                        <th>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ route('users.edit', $user->_id) }}" class="btn btn-warning"
                                        title="editar"><span class="material-symbols-outlined">border_color</span></a>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ route('users.destroy', $user->_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Eliminar"><span
                                                class="material-symbols-outlined">delete</span></button>
                                    </form>
                                </div>
                            </div>

                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name"
                                aria-describedby="emailHelp" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="email" name="email"
                                aria-describedby="emailHelp" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                aria-describedby="emailHelp" required>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
