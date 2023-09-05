@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="text-center mt-3">Listado de Pedidos</h3>

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
        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo Pedido</a>
        <table class="table mt-3">
            <thead class="table-dark">
                <th>Id</th>
                <th>Id Usuario</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Valor</th>
                <th>Total</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th>{{ $order->_id }}</th>
                        <th>{{ $order->userId }}</th>
                        <th>{{ $order->product }}</th>
                        <th>{{ $order->quantity }}</th>
                        <th>{{ $order->value }}</th>
                        <th>{{ $order->total }}</th>

                        <th>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ route('orders.edit', $order->_id) }}" class="btn btn-warning"
                                        title="editar"><span class="material-symbols-outlined">border_color</span></a>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ route('orders.destroy', $order->_id) }}" method="POST">
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
                    <h5 class="modal-title" id="exampleModalLabel">Crear Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Usuario</label>
                            <select name="user" id="user" class="form-control">
                                <option value="seleccione" disabled selected>Seleccione..</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->_id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="product" class="form-label">Producto</label>
                            <input type="text" class="form-control" id="product" name="product"
                                aria-describedby="emailHelp" required>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                aria-describedby="emailHelp" required>
                        </div>

                        <div class="mb-3">
                            <label for="value" class="form-label">Valor</label>
                            <input type="number" class="form-control" id="value" name="value"
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
