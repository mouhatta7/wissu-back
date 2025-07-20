<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userss extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'telephone'
    ];

    // Relation avec les commandes
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}