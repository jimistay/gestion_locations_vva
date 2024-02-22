<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resa extends Model
{
    use HasFactory;
    protected $table = 'resa';
    protected $primaryKey = 'NORESA';
    protected $fillable = [
        'NORESA',
        'USER',
        'DATEDEBSEM',
        'NOHEB',
        'CODEETATRESA',
        'DATERESA',
        'DATEARRHES',
        'MONTANTARRHES',
        'NBOCCUPANT',
        'TARIFSEMRESA',
        'id'
    ];

    public function etat_resa()
    {
        return $this->belongsTo(Etat_resa::class, 'CODEETATRESA', 'CODEETATRESA');
    }
    // pour obtenir l'utilisateur associé à la réservation
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function hebergement()
    {
        return $this->belongsTo(Hebergement::class, 'NOHEB');
    }
}
