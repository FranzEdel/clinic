<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    // RELACIONES
    public function permisions()
    {
        return $this->hasMany('App\Permission');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    // ALMACENAMIENTO


    // VALIDACION


    // RECUPERACION DE INFORMACIÓN


    // OTRAS OPERACIONES
}
