<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookReturn extends Model
{
    protected $guarded = ['id'];

    public function BorrowingBook(){
        return $this->belongsTo(BorrowingBook::class);
    }
}
