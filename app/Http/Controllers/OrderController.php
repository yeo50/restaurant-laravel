<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Cart;
use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.order', ['orders' => $orders]);
    }
    public function search(HttpRequest $request)
    {
        $search = $request->search;

        $orders = Order::where('name', 'Like', '%' . $search . '%')->orWhere('foodname', 'Like', '%' . $search . '%')->get();
        return view('admin.order', ['orders' => $orders]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {


        foreach ($request->foodname as $key => $foodname) {
            $new = new Order();
            $new->foodname = $foodname;
            $new->price = $request->price[$key];
            $new->quantity = $request->quantity[$key];
            $new->name = $request->name;
            $new->phone = $request->phone;
            $new->address = $request->address;
            $new->save();
            $cart = Cart::find($request->id[$key]);
            $cart->delete();
        }

        return redirect()->back()->with('status', 'order success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back();
    }
}
