<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DinamicSelect extends Component
{
    public $options = [];
    public $selectedOption;
    public $tableName;
    public $selectId;
    public $newElementName; // Nueva propiedad para el nombre del elemento

    public function mount($tableName, $selectId)
    {
        $this->tableName = $tableName;
        $this->selectId = $selectId;
        $this->loadOptions();
        $this->dispatch('InitialLoadOptions', options: $this->options);
    }

    public function loadOptions()
    {
        $this->options = DB::table($this->tableName)
        ->select('id', 'nombre')
        ->get()
        ->toArray();
    }

    public function addElement()
    {
        // Validar que el nuevo nombre no esté vacío
        $this->validate([
            'newElementName' => 'required|string|max:255',
        ]);

        // Agregar nuevo elemento a la tabla
        $newElementId = DB::table($this->tableName)->insertGetId(['nombre' => $this->newElementName]);

        // Recargar las opciones
        $this->loadOptions();

        // Resetear el nombre del nuevo elemento
        $this->newElementName = '';

     

        // Emitir un evento para actualizar las opciones en el frontend
       // $this->dispatch('loadOptions', options: $this->options, selected: $newElementId);
        $this->dispatch('closeModal', id: "modal-agregar-{$this->tableName}");
    }

    public function requestOptions()
    {
        // Emitir las opciones iniciales
        $this->dispatch('loadOptions', ['options' => $this->options]);
    }

    protected function getListeners()
    {
        return [
            'requestOptions' => 'requestOptions'
        ];
    }

    public function render()
    {
        return view('livewire.dinamic-select');
    }
}