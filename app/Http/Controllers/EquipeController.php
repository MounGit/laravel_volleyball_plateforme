<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Role;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipe = Equipe::all();
        // $role = Role::all();
        return view('pages.Equipes.equipe', compact('equipe'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $continent = Continent::all();
        return view('pages.Equipes.equipeCreate', compact('continent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "city" => "required",
            "country" => "required",
            "max" => "required",
            "continent_id" => "required"
        ]);

        $equipe = new Equipe;
        $equipe->name = $request->name;
        $equipe->city = $request->city;
        $equipe->country = $request->country;
        $equipe->max = $request->max;
        $equipe->continent_id = $request->continent_id;
        $equipe->save();

        return redirect()->route('equipes.index')->with('message', 'équipe ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        return view('pages.Equipes.equipeShow', compact('equipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe)
    {
        $continent = Continent::all();
        return view('pages.Equipes.equipeEdit', compact('equipe', 'continent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            "name" => "required",
            "city" => "required",
            "country" => "required",
            "max" => "required",
            "continent_id" => "required"
        ]);

        $equipe->name = $request->name;
        $equipe->city = $request->city;
        $equipe->country = $request->country;
        $equipe->max = $request->max;
        $equipe->continent_id = $request->continent_id;
        $equipe->save();

        return redirect()->route('equipes.index')->with('message', 'équipe modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        $equipe->delete();
        return redirect()->route('equipes.index')->with('message', 'équipe supprimée avec succès');

    }
}
