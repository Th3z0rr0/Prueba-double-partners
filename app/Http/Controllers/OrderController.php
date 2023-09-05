<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Events\PedidoCreado; 

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $users = User::all();
        return view('orders.index', ['orders' => $orders,'users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required|string',
            'product' => 'required|string|max:100',
            'quantity' => 'required|numeric',
            'value' => 'required|numeric'
        ]);
        
        
        $total = $request->quantity * $request->value;
        
        $order = new Order([
            'userId' => $request->input('user'),
            'product' => $request->input('product'),
            'quantity' => $request->input('quantity'),
            'value' => $request->input('value'),
            'total' => $total
        ]);

        $order->save();

        event(new PedidoCreado($order));

        return redirect()->back()->with('success', 'Pedido Creado Correctamente');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $users = User::all();

        return view('orders.edit', ['order' => $order,'users' => $users]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user' => 'required|string',
            'product' => 'required|string|max:100',
            'quantity' => 'required|numeric',
            'value' => 'required|numeric'
        ]);
        
        $order = Order::find($id);
        
        if (!$order) {
            return redirect()->back()->with('error', 'Pedido no encontrado');
        }
        
        $total = $request->quantity * $request->value;
        
        $order->userId = $request->input('user');
        $order->product = $request->input('product');
        $order->quantity = $request->input('quantity');
        $order->value = $request->input('value');
        $order->total = $total;
        $order->save();

        return redirect()->back()->with('success', 'Pedido Actualizado Correctamente');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'Pedido Eliminado Correctamente');
    }
}
