<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function welcome()
    {
        $foods = Food::all();
        $chefs = Chef::all();
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id', $user_id)->get()->count();
        } else {
            $count = 0;
        }

        return view('welcome', ['foods' => $foods, 'chefs' => $chefs, 'count' => $count]);
    }
    public function dashboard()
    {
        $chefs = Chef::all();
        $foods = Food::all();
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $count = Cart::where('user_id', $user_id)->get()->count();
        } else {
            $count = 0;
        }


        return view('dashboard', ['foods' => $foods, 'chefs' => $chefs, 'count' => $count]);
    }
    public function index()
    {
        if (Auth::check()) {
            $userType = Auth::user()->usertype;
            if ($userType == 1) {
                return view('admin.index');
            } else {
                $chefs = Chef::all();
                $foods = Food::all();
                $user_id = Auth::user()->id;
                $count = Cart::where('user_id', $user_id)->get()->count();
                return view('home', compact('foods', 'chefs', 'count'));
            }
        } else {
            $chefs = Chef::all();
            $foods = Food::all();

            return view('home', compact('foods', 'chefs'));
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
  
}
