<?php

namespace App\Http\Livewire;

use avadim\FastExcelWriter\Excel;
use Livewire\Component;

class SpreadsheetDataList extends Component
{
    protected $listeners = ['setProcessData' => 'setProcessData'];

    public $header = [];
    public $dataList = [];

    public function setProcessData($processData)
    {
        $this->header = $processData["header"];
        $this->dataList = $processData["dataList"];
    }

    public function downloadSpreadsheets()
    {
        $excel = Excel::create(array_keys($this->dataList));
        foreach ($this->dataList as $key => $list) {
            $sheet = $excel->getSheet($key);
            $sheet->writeHeader($this->header);

            $arrLines = [];
            $lines = explode(" - ", array_keys($list)[0]);
            foreach ($lines as $line) {
                $arrLines[] = explode(": ", $line)[1];
            }

            $arrItems = [];
            foreach ($list as $items) {
                $impItems  = implode(";", array_values($items)[0]);
                $arrItems[] = $impItems;
            }

            $sheet->writeRow([
                ...$arrLines,
                ...$arrItems
            ]);
        }

        $uniqid = uniqid(time());
        $filePath = $excel->getTempFilePath("spreadsheet_reader_{$uniqid}.xlsx");

        return response()->download($filePath);
    }

    public function render()
    {
        return view('livewire.spreadsheet-data-list');
    }
}
