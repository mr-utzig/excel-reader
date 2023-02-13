<?php

namespace App\Http\Livewire;

use avadim\FastExcelReader\Excel;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadSpreadsheetForm extends Component
{
    use WithFileUploads;

    public $spreadsheet;
    public $hasNoHeader;
    public $spreadsheetHeader;
    public $arrSpreadsheetHeader = [];

    public function emitFormData()
    {
        $tmpPath = $this->spreadsheet->getRealPath();
        $excel = Excel::open($tmpPath);
        $arrData = $excel->readRows([], Excel::KEYS_ZERO_BASED);

        if (!$this->hasNoHeader) {
            $this->arrSpreadsheetHeader = array_shift($arrData);
        }

        $this->emit("formData", [
            "spreadsheetRows" => $arrData,
            "spreadsheetHeader" => $this->arrSpreadsheetHeader
        ]);
    }

    public function spreadsheetValidation(): void
    {
        $this->resetValidation();
        $this->validate([
            'spreadsheet' => 'max:102400'
        ]);
    }

    public function pushHeader(): void
    {
        if ($this->spreadsheetHeader) {
            $this->arrSpreadsheetHeader[] = trim($this->spreadsheetHeader);
            $this->reset('spreadsheetHeader');
        }
    }

    public function removeHeader($index): void
    {
        unset($this->arrSpreadsheetHeader[$index]);
    }


    public function render()
    {
        return view('livewire.upload-spreadsheet-form');
    }
}
