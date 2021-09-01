<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'provider_id',
        'latitude',
        'longitude',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
