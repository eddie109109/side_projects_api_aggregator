<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $postCount = 1;
 
    protected $listeners = ['postAdded' => 'incrementPostCount'];
 
    public function incrementPostCount()
    {
        $this->postCount += 1;
    }

    public function render()
    {
        return view('livewire.test');
    }
}
