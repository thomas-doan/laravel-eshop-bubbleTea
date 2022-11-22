<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\NumHistoryCommande;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashBoardAdminController extends Controller
{
    public function index()
    {
        $commandes = NumHistoryCommande::all();
        $sum = NumHistoryCommande::sum('price_with_tva');
        $sumCommandes = NumHistoryCommande::sum('total_products');
        return view('dashboardAdmin', [
            'commandes' => $commandes,
            'sum' => $sum,
            'sumCommandes' => $sumCommandes
        ]);
    }

    public function show($id)
    {
        //
    }
}
