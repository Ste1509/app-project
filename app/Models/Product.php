<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    /**
     * Get the parent category model .
     */
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * La función `getRouteKeyName()` le dice a Laravel que use el campo `slug` en lugar del campo `id` al generar URL
     *
     * @return La columna slug de la base de datos.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
