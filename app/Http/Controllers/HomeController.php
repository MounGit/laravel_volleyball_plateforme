<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $equipe = Equipe::all();
        $joueur = Joueur::all();
        $photo = Photo::all();
        return view('pages.Home.home', compact('equipe', 'joueur', 'photo'));       
    }
}
