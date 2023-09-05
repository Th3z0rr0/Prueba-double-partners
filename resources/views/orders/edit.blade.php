@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="text-center mt-3">Editar Pedido</h3>

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
                <form action="{{ route('orders.update', $order->_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Usuario</label>
                        <select name="user" id="user" class="form-control">
                            <option value="seleccione"  >Seleccione..</option>
                            @foreach ($users as $user)
                                <option @if($user->_id == $order->userId)) selected @endif  value="{{$user->_id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="product" class="form-label">Producto</label>
                        <input type="text" class="form-control" id="product" name="product"
                            aria-describedby="emailHelp" value="{{ $order->product }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="quantity" name="quantity"
                            aria-describedby="emailHelp" value="{{ $order->quantity }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="value" class="form-label">Valor</label>
                        <input type="number" class="form-control" id="value" name="value"
                            aria-describedby="emailHelp" value="{{ $order->value }}" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Guardar</button>

                </form>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
