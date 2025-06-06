<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    protected $fillable = [
        'name',
    ];

      use HasFactory;


    public function books() {
        return $this->hasMany(book::class);
    }
}
