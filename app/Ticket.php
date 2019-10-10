<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'typeCase',
        'priority',
        'address',
        'latitude',
        'longitude',
        'description',
        'status',
        'technical_id',
        'client_id'
    ];

    public function technical()
    {
        return $this->belongsTo('App\User', 'technical_id');
    }

    public function client()
    {
        return $this->belongsTo('App\User', 'client_id');
    }

    public function status()
    {
        if ($this->status == 0)
            return "Pendiente";
        if ($this->status == 1)
            return "En curso";
        if ($this->status == 2)
            return "Resuelto";
    }
}
