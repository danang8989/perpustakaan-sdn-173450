<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberClass extends Model
{
    public $guarded = ['id'];

    public function member(){
        return $this->hasMany(Member::class);
    }
}
