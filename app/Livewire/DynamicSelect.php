<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DynamicSelect extends Component
{
    public $tableName;
    public $records = [];
    public $selectedRecord;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount($tableName)
    {
        $this->tableName = $tableName;
        $this->loadRecords();
    }

    public function loadRecords()
    {
        $this->records = DB::table($this->tableName)->get(['id', 'nombre']);
    }

    public function addRecord($name)
    {
        DB::table($this->tableName)->insert(['nombre' => $name]);
        $this->loadRecords();
    }

    public function editRecord($id, $name)
    {
        DB::table($this->tableName)->where('id', $id)->update(['nombre' => $name]);
        $this->loadRecords();
    }

    public function deleteRecord($id)
    {
        DB::table($this->tableName)->where('id', $id)->delete();
        $this->loadRecords();
    }

    public function render()
    {
        return view('livewire.dynamic-select');
    }
}