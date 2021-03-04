<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //obtener la categoria de la receta con FK
    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }
}
