<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = ['id'];

    public function classMember(){
        return $this->belongsTo(MemberClass::class);
    }

    public function book(){
        return $this->Many(Book::class);
    }
}
