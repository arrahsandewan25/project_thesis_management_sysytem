<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    

    public function team_member1()
    {
        return $this->hasOne(Team::class, 'member_1');
    }

    public function team_member2()
    {
        return $this->hasOne(Team::class, 'member_2');
    }

    public function team()
    {
        //member_1 or member_2
        return $this->hasOne(Team::class, 'member_1')->orWhere('member_2', $this->id);
    }
}
