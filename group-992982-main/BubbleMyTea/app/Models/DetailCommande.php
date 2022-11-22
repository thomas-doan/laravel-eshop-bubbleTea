<?php

namespace App\Models;

use App\Models\NumHistoryCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailCommande extends Model
{
    protected $fillable = [
        'title',
        'price',
        'date',
        'quantity',
        'nb_ingredients',
        'base',
        'toping1',
        'toping2',
        'toping3',
        'toping4',
        'perle',
        'sucre',
        'num_history_commande_id',
    ];


    public function numHistoryCommande()
    {
        return $this->belongsTo(NumHistoryCommande::class);
    }
    use HasFactory;
}
