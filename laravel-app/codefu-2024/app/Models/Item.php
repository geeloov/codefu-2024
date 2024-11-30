<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    public function avatars()
    {
        return $this->belongsToMany(Avatar::class, 'avatar_item')->withTimestamps(); // Pivot table avatar_item
    }
    
    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'category_id'); // Assuming foreign key is item_category_id in items table
    }
}
