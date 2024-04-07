<?php

namespace App\Http\Controllers;

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
        return view('welcome', ['foods' => $foods]);
    }
    public function dashboard()
    {
        $foods = Food::all();
        return view('welcome', ['foods' => $foods]);
    }
    public function index()
    {
        $userType = Auth::user()->usertype;
        $foods = Food::all();
        if ($userType == 1) {
            return view('admin.index');
        } else {

            return view('home', compact('foods'));
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
