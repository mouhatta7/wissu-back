<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dress_id',
        'couleur_choisie',
        'taille_choisie',
        'prix_total',
        'status'
    ];

    protected $casts = [
        'prix_total' => 'decimal:2'
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(Userss::class);
    }

    public function dress()
    {
        return $this->belongsTo(Dress::class);
    }
}