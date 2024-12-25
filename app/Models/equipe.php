<?php

namespace App\Models;

use App\Models\domaine;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class equipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'domaine_id',
        'nom_equipe',
        'description',
    ];
    public function domaine():BelongsTo{
        return $this->belongsTo(domaine::class);
    }
}
