<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    protected $table = 'acara';

    protected $guarded = [];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking', 'id');
    }
}
