<?php

namespace App\Models;

use App\Models\DetailCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NumHistoryCommande extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'total_products',
        'date',
        'tva',
        'price_witout_tva',
        'price_with_tva',
        'created_at',
        'updated_at'
    ];

    public function detailCommandes()
    {
        return $this->hasMany(DetailCommande::class);
    }
    use HasFactory;
}
