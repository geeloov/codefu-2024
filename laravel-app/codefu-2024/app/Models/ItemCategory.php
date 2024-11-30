<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id'); // Items will have item_category_id as foreign key
    }
}
