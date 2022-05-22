<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    use HasFactory;

    protected $table = "contents";

    public function getCategory()
    {
        return $this->belongsTo('App\Models\Categories', 'cat_id');
    }
}
