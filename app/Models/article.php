<?php

namespace App\Models;

use App\Models\equipe;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class article extends Model
{
    use HasFactory;
    protected $fillable = [
        'User_id',
        'equipe_id',
        'title',
        'pdf_path',
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function equipe():BelongsTo{
        return $this->belongsTo(equipe::class);
    }
}
