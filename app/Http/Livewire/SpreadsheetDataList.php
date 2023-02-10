<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SpreadsheetDataList extends Component
{
    protected $listeners = ['formData' => 'setFormData'];

    public $arrRows = [];
    public $arrHeader = [];


    public function setFormData($data)
    {
        $this->arrRows = $data["spreadsheetRows"];
        $this->arrHeader = $data["spreadsheetHeader"];
    }

    public function process()
    {
    }

    public function render()
    {
        return view('livewire.spreadsheet-data-list');
    }
}
