<?php

namespace App\Models;

use App\Http\Controllers\JoueurController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $table = "equipes";

    protected $fillable = ["name", "city", "country", "max", "continent_id"];

    public function joueurs () {
        return $this->hasMany(Joueur::class);
    }

    public function continent () {
        return $this->belongsTo(Continent::class);
    }
}
