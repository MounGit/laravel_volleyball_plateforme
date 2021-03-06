<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueur = Joueur::all();
        return view('pages.Joueurs.joueur', compact('joueur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        $equipe = Equipe::all();
        return view('pages.Joueurs.joueurCreate', compact('role', 'equipe'));
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
            "firstname" => "required",
            "age" => "required",
            "phone" => "required",
            "email" => "required",
            "gender" => "required",
            "country" => "required",
            "role_id" => "required",
        ]);

        $joueur = new Joueur;
        $joueur->name = $request->name;
        $joueur->firstname = $request->firstname;
        $joueur->age = $request->age;
        $joueur->phone = $request->phone;
        $joueur->email = $request->email;
        $joueur->gender = $request->gender;
        $joueur->country = $request->country;
        $joueur->role_id = $request->role_id;
        $joueur->equipe_id = $request->equipe_id;
        $joueur->save();

        $request->validate([
            "url" => "required",
        ]);

        $photo = new Photo;
        $photo->url = $request->file('url')->hashName();
        $photo->joueur_id = $joueur->id;
        $photo->save();

        $request->file('url')->storePublicly('img', 'public');


        return redirect()->route('joueurs.index')->with('message', 'joueur ajout?? avec succ??s');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function show(Joueur $joueur)
    {
        $role = Role::all();
        $equipe = Equipe::all();
        return view('pages.Joueurs.joueurShow', compact('joueur', 'role', 'equipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function edit(Joueur $joueur)
    {
        // $role = Role::all();
        $equipe = Equipe::all();
        // $photo = Photo::all();
        return view('pages.Joueurs.joueurEdit', compact('joueur', 'equipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Joueur $joueur)
    {
        $request->validate([
            "name" => "required",
            "firstname" => "required",
            "age" => "required",
            "phone" => "required",
            "email" => "required",
            "gender" => "required",
            "country" => "required",
            "role_id" => "required",
            "equipe_id" => "required",
            "url" => "required",
        ]);

        $joueur->name = $request->name;
        $joueur->firstname = $request->firstname;
        $joueur->age = $request->age;
        $joueur->phone = $request->phone;
        $joueur->gender = $request->gender;
        $joueur->country = $request->country;
        $joueur->role_id = $request->role_id;
        $joueur->equipe_id = $request->equipe_id;
        $joueur->save();
        $photo = Photo::find($joueur->photo->id);


        Storage::disk('public')->delete('img/'.$photo->url);

        $photo->url = $request->file('url')->hashName();
        $photo->joueur_id = $joueur->id;
        $photo->save();

        $request->file('url')->storePublicly('img', 'public');

        return redirect()->route('joueurs.index')->with('message', 'joueur modifi?? avec succ??s');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joueur $joueur)
    {
        $photo = Photo::find($joueur->photo->id);
        Storage::disk('public')->delete('img/'.$photo->url);
        $joueur->delete();
        return redirect()->route('joueurs.index')->with('message', 'joueur supprim?? avec succ??s');

    }
}
