<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class domaine extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_du_domaine',
        'description',
    ];
}
