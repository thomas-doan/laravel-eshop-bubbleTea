<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{

    public $query;
    public $products = [];

    public function updatedQuery()
    {


        $words = '%' . $this->query . '%';
        dd($words);

        if (strlen($this->query) >= 2) {
            $this->products = Product::where('description', 'like', $words)->get()->toArray();
            dd($this->products);
        }
    }
    public function render()
    {

        return view('accueil', [
            'articles' => $this->products
        ]);
    }
}
