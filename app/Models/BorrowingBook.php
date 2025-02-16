<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowingBook extends Model
{
    protected $guarded = ['id'];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function bookReturn(){
        return $this->hasMany(BookReturn::class);
    }
}
