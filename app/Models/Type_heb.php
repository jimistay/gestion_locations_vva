<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_heb extends Model
{
    use HasFactory;
    protected $table = 'type_heb';
    protected $fillable = [
        'CODETYPEHEB',
        'NOMTYPEHEB',
    ];
}
