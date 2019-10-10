<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'occupation', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isSuperadmin()
    {
        if ($this->role_id == 1) {
            return true;
        }

        return false;
    }

    public function scopeTechnicals(Builder $query)
    {
        return
            $query->where('role_id','=',2)
            ->get();
    }

    public function scopeClients(Builder $query)
    {
        return
            $query->where('role_id','=',3)
            ->get();
    }

    public function isClient()
    {
        if ($this->role_id == 3) {
            return true;
        }

        return false;
    }

    public function isTechnical()
    {
        if ($this->role_id == 2) {
            return true;
        }

        return false;
    }


}
