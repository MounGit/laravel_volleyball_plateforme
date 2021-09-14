<?php

namespace App\Http\Controllers;

use App\Models\Joueur;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo = Photo::all();
        return view('pages.Photos.photo', compact('photo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $joueur = Joueur::all();
        return view('pages.Photos.photoCreate', compact('joueur'));
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
            "url" => "required",
            "joueur_id" => "required"
        ]);

        $photo = new Photo;
        $photo->url = $request->file('url')->hashName();
        $photo->joueur_id = $request->joueur_id;
        $photo->save();

        $request->file('url')->storePublicly('img', 'public');

        return redirect()->route('photos.index')->with('message', 'photo ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('pages.Photos.photoShow', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view('pages.Photos.photoEdit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            "url" => "required",
            "joueur_id" => "required"
        ]);

        Storage::disk('public')->delete('img/'.$photo->url);

        $photo->url = $request->file('url')->hashName();
        $photo->joueur_id = $request->joueur_id;
        $photo->save();

        $request->file('url')->storePublicly('img', 'public');

        return redirect()->route('photos.index')->with('message', 'photo modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        Storage::disk('public')->delete('img/'.$photo->url);
        $photo->delete();
        return redirect()->route('photos.index')->with('message', 'photo supprimée avec succès');
        
    }
}
