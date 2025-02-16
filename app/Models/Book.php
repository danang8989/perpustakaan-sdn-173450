<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];

    public function categoryBook(){
        return $this->belongsTo(CategoryBook::class);
    }

    public function shelf(){
        return $this->belongsTo(Shelf::class);
    }

    public function borrowingBook(){
        return $this->hasMany(BorrowingBook::class);
    }
}
