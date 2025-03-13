<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::All();
        return view('pets.index')->with(['pets' => $pets]);
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
    public function store(PetRequest $request)
    {
        $pet = new Pet;
        $pet->name = $request->name;
        $pet->type = $request->type;
        $pet->breed = $request->breed;
        $pet->size = $request->size;

        if ($pet->save()) {
            return redirect('pets')->with('messages', 'La mascota: ' . $pet->name . ' ¡Fue creada!');
        }
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
    public function edit(Pet $pet)
    {
        return ['pet' => $pet];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PetRequest $request, Pet $pet)
    {
        $pet->name = $request->name;
        $pet->type = $request->type;
        $pet->breed = $request->breed;
        $pet->size = $request->size;

        if ($pet->save()) {
            return redirect('pets')->with('messages', 'La mascota: ' . $pet->name . ' ¡Fue actualizda!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        if ($pet->delete()) {
            return redirect('users')->with('messages', 'El usuario: ' . $pet->name . ' ¡Fue eliminado!');
        }
    }

    public function search(Request $request)
    {
        $pets = Pet::names($request->q)->paginate(20);
        return view('pets.search')->with(['pets' => $pets]);
    }
}
