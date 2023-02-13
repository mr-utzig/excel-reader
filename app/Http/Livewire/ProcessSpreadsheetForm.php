<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProcessSpreadsheetForm extends Component
{
    protected $listeners = ['formData' => 'setFormData'];

    public $arrRows = [];
    public $arrHeader = [];

    public $primaryColumn = 0;
    public $columnsThatRepeat = [];
    public $columnFormat = [];

    public function setFormData($data)
    {
        $this->arrRows = $data["spreadsheetRows"];
        $this->arrHeader = $data["spreadsheetHeader"];
    }

    public function process()
    {
        $this->validate([
            "primaryColumn" => "required",
            "columnsThatRepeat" => "required"
        ]);

        $dataList = [];
        for ($i = 0; $i < count($this->arrRows); $i++) {
            $line = $this->arrRows[$i];
            $key = $line[$this->primaryColumn];

            $dataListLabel = [];
            foreach ($this->columnsThatRepeat as $column) {
                $columnName = $this->arrHeader[$column];

                $tag = $this->formatColumn($columnName, $columnName);
                $value = $this->formatColumn($line[$column], $columnName);

                $dataListLabel[] = "{$tag}: {$value}";
            }
            $dataListLabel = implode(" - ", $dataListLabel);

            foreach ($line as $index => $value) {
                if (in_array($index, $this->columnsThatRepeat)) {
                    continue;
                }

                if (isset($this->arrHeader[$index])) {
                    $columnName = $this->arrHeader[$index];
                    $dataListItemGroup = $this->formatColumn($this->arrHeader[$index], $columnName);
                    $dataList[$key][$dataListLabel][$dataListItemGroup][] = $this->formatColumn($value, $columnName);
                }
            }
        }

        $this->reset([
            "primaryColumn",
            "columnsThatRepeat",
            "columnFormat"
        ]);
        $this->emit("setProcessData", [
            "dataList" => $dataList,
            "header" => $this->arrHeader
        ]);
    }

    private function formatColumn(string $column, string $identifier)
    {
        $response = "";
        switch ($this->columnFormat[$identifier]) {
            case 1:
                $response = strtoupper($column);
                break;
            case 2:
                $response = strtolower($column);
                break;
            case 3:
                $response = ucfirst($column);
                break;
            default:
                $response = $column;
        }

        return $response;
    }

    public function render()
    {
        return view('livewire.process-spreadsheet-form');
    }
}
