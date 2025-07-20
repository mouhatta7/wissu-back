<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dress extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'nom',
        'prix',
        'description',
        'image',
        'variantes'
    ];

    protected $casts = [
        'variantes' => 'array',
        'prix' => 'decimal:2'
    ];

    // Relation avec les commandes
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}