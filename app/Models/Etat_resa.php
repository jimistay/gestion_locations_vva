<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat_resa extends Model
{
    use HasFactory;
    protected $table = 'etat_resa';
    protected $primaryKey = 'CODEETATRESA';
    protected $fillable = [
        'CODEETATRESA',
        'NOMETATRESA',
    ];
}
