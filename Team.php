<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function member1()
    {
        return $this->belongsTo(User::class, 'member_1');
    }

    public function member2()
    {
        return $this->belongsTo(User::class, 'member_2');
    }
}
