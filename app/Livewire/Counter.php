<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\products;

class Counter extends Component
{
    public $search = '';
    public function renders()
    {      
              $products= products::where('name', $this->search)->get();
dd($products);
        
    //     return view('livewire.counter',[    

              
    // ]);
    }

   
 
   
}
