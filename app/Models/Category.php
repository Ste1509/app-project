<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * > The `products()` function returns all the products that belong to the category
     *
     * @return A collection of products.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * > This function returns all the products that are active and belong to this category
     *
     * @return The categoriesAvailableProducts method returns all the products that are active and belong to the category.
     */
    public function categoriesAvailableProducts(){

        return $this->hasMany(Product::class)->where('active','1');
    }
}
