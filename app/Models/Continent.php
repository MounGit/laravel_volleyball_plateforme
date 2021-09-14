<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    use HasFactory;

    protected $table = "continents";

    protected $fillable = ["name"];

    public function equipes () {
        return $this->hasMany(Equipe::class);
    }
}
