<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //campos que se agregan
    protected $fillable = [
        'titulo', 'preparacion', 'ingredientes','imagen','categoria_id'
    ];
    //obtener la categoria de la receta con FK
    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }

    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //likes que ha recibido
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_receta');
    }
}
