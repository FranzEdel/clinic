<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'description', 'slug'
    ];

    // RELACIONES
    public function permisions()
    {
        return $this->hasMany('App\Permission');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    // ALMACENAMIENTO
    public function store($request)
    {
        $slug = str_slug($request->name, '-');
        return self::create($request->all() + [
            'slug' => $slug,
        ]);
    }

    public function my_update($request)
    {
        $slug = str_slug($request->name, '-');
        self::update($request->all() + ['slug' => $slug]);
    }

    // VALIDACION


    // RECUPERACION DE INFORMACIÓN


    // OTRAS OPERACIONES
}
