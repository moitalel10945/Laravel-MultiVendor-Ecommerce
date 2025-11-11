<?php

namespace App\Livewire;

use Livewire\Component;

class Sellerdashboard extends Component
{
    public $tab='products';
    public function render()
    {
        return view('livewire.sellerdashboard');
    }
}
