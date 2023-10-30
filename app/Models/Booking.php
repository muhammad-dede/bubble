<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket', 'id');
    }

    public function acara()
    {
        return $this->hasOne(Acara::class, 'id_booking', 'id');
    }
}
