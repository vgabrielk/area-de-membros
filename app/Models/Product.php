<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'status',
        'banner',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
