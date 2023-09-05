@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="text-center mt-3">Editar Usuario</h3>

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

        <div class="row">
            <div class="col"></div>
            <div class="col-md-6 border p-3 rounded">
                <form action="{{ route('users.update', $user->_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name"
                            aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" value="{{ $user->email }}" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text" value="{{ $user->phone }}" class="form-control" id="phone" name="phone"
                            aria-describedby="emailHelp" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Guardar</button>

                </form>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
