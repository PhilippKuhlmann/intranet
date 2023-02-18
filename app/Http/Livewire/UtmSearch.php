<?php

namespace App\Http\Livewire;

use App\Models\UTM;
use Livewire\Component;

class UtmSearch extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        if ($this->search) {
            $utms = UTM::where('customer', 'like', '%'.$this->search.'%')->get();
        } else {
            $utms = UTM::all();
        }

        return view('livewire.utm-search', [
            'utms' => $utms,
        ]);
    }
}
