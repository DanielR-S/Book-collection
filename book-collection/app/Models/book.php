<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class book extends Model
{

    protected $fillable = [
        'title',
        'description',
        'author_id'
    ];

  use HasFactory;

        public function reviews() {
        return $this->hasMany(review::class);
    }

        public function author() {
        return $this->belongsTo(author::class);
    }
}
