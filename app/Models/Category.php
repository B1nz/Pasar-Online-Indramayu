<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Category as ModelsCategory;

class Category extends ModelsCategory
{
    public function produks()
    {
        return $this->belongsToMany(Produk::class,'product_categories');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function allProducts()
    {
        $allProducts = collect([]);

        $mainCategoryProducts = $this->produks;

        $allProducts = $allProducts->concat($mainCategoryProducts);

        if($this->children->isNotEmpty()) {

            foreach($this->children as $child) {
                $allProducts = $allProducts->concat($child->produks);

            }

        }

        return $allProducts;


    }

}
