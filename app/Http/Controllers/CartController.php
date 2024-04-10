<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCartRequest $request)
    {

        $new = $request->all();
        $new['user_id'] = Auth::user()->id;

        Cart::create($new);
        return redirect(url()->previous() . '#menu')->with('message', 'Order Success')->with('order_id', $new['food_id']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id', $user_id)->get()->count();
        } else {
            $count = 0;
        }
        $carts = Cart::with('food')
            // ->select('carts.id', 'carts.user_id', 'carts.food_id', 'carts.quantity', 'carts.created_at', 'carts.updated_at', 'food.title', 'food.price', 'food.image', 'food.description')
            ->where('carts.user_id', $id)
            ->get();
        // $carts = Cart::select('carts.id', 'carts.user_id', 'carts.food_id', 'carts.quantity', 'carts.created_at', 'carts.updated_at', 'food.title', 'food.price', 'food.image', 'food.description')
        //     ->where('carts.user_id', $id)
        //     ->join('food', 'carts.food_id', '=', 'food.id')
        //     ->get();
        // return $carts;

        return view('cart', ['carts' => $carts, 'count' => $count]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {

        $cart->delete();
        return redirect()->back();
    }
}
