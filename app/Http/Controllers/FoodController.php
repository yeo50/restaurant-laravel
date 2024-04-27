<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Http\Resources\FoodResource;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function menu()
    {
        $foods = Food::all();
        return view('admin.foodmenu', ['foods' => $foods]);
    }
    public function index()
    {
        $foods = Food::get();
        $collection = FoodResource::collection($foods);
        return jsonSuccess($collection);
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
    public function store(StoreFoodRequest $request)
    {
        $new = $request->all();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('photos', 'public');
            $new['image'] = $imagePath;
        }
        Food::create($new);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        return view('admin.foodedit', ['food' => $food]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $new = $request->all();
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($food->image);
            $imagePath = $request->file('image')->store('photos', 'public');
            $new['image'] = $imagePath;
        }
        $food->update($new);
        return redirect()->route('foods.menu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->back();
    }
}
