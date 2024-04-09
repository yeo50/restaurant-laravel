<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Http\Requests\StoreChefRequest;
use App\Http\Requests\UpdateChefRequest;
use Illuminate\Support\Facades\Storage;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefs = Chef::all();
        return view('admin.adminchef', ['chefs' => $chefs]);
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
    public function store(StoreChefRequest $request)
    {
        $new = $request->all();
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $new['photo'] = $photoPath;
        };
        Chef::create($new);
        return redirect()->back()->with('message', "New Chef added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Chef $chef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chef $chef)
    {

        return view('admin.chefedit', ['chef' => $chef]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChefRequest $request, Chef $chef)
    {
        $new = $request->all();
        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($chef->photo);
            $photoPath = $request->file('photo')->store('photos', 'public');
            $new['photo'] = $photoPath;
        }
        $chef->update($new);
        return redirect()->route('chefs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        $chef->delete();
        return redirect()->back();
    }
}
