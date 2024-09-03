<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class MultiOptionSelect extends Component
{
    public $tableName;
    public $records = [];
    public $selectedRecord;
    public $componentId;
    protected $listeners = ['refreshComponent' => '$refresh', 'setSelectedRecord'];

    public function mount($tableName, $componentId)
    {
        $this->tableName = $tableName;
        $this->componentId = $componentId;
        $this->loadRecords();
        $this->dispatch('InitialLoadOptions', 
        records: $this->records,
        componentId: $this->componentId);
    }

    public function loadRecords()
    {
       
        if ($this->tableName === 'proveedores') {
            $this->records = DB::table($this->tableName)->get(['id', 'nombre','numero']);
        }else{
            $this->records = DB::table($this->tableName)->get(['id', 'nombre']);
        }
    }

    public function setSelectedRecord($id,$componentId)
    {
        if($componentId == $this->componentId){
        $this->selectedRecord = $id;
}
        $this->dispatch('SelectedRecord', selectedRecord: $this->selectedRecord,
        componentId: $this->componentId);
    }

    public function addRecord($name, $number)
{
    // Validación común para todos los casos
    $validatorData = [
        'nombre' => $name,
    ];

    $validatorRules = [
        'nombre' => 'required|string|max:255|unique:' . $this->tableName . ',nombre',
    ];

    $validatorMessages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.string' => 'El nombre debe ser una cadena de texto.',
        'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
        'nombre.unique' => 'El nombre ya existe en la base de datos.',
    ];

    // Validación adicional para la tabla 'proveedores'
    if ($this->tableName === 'proveedores') {
        $validatorData['number'] = $number;
        $validatorRules['number'] = 'required|unique:' . $this->tableName . ',numero';
        $validatorMessages['number.required'] = 'El campo número es obligatorio.';
        $validatorMessages['number.unique'] = 'El número ya existe en la base de datos.';
    }

    // Realizar la validación
    $validator = Validator::make($validatorData, $validatorRules, $validatorMessages);

    // Verificar si la validación falla
    if ($validator->fails()) {
        $this->dispatch('ValidationError_' . $this->componentId, message: $validator->errors()->first());
        return;
    }

    // Insertar el registro en la base de datos
    $dataToInsert = ['nombre' => $name];
    if ($this->tableName === 'proveedores') {
        $dataToInsert['numero'] = $number;
    }
    $id = DB::table($this->tableName)->insertGetId($dataToInsert);

    // Actualizar registros y enviar respuestas a la vista
    $this->loadRecords();
    $this->setSelectedRecord($id, $this->componentId);
    $this->dispatch('ValidationSuccess_' . $this->componentId, message: "Exitoso!");
    $this->dispatch('LoadOptions', 
       records: $this->records,
       selectedRecord: $this->selectedRecord,
       componentId: $this->componentId);
}


public function editRecord($id, $name, $number = null)
{
    // Validación del nombre
    $validatorData = ['nombre' => $name];
    $validatorRules = [
        'nombre' => 'required|string|max:255|unique:' . $this->tableName . ',nombre,' . $id
    ];
    $validatorMessages = [
        'nombre.required' => 'El campo nombre es obligatorio.',
        'nombre.string' => 'El nombre debe ser una cadena de texto.',
        'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
        'nombre.unique' => 'El nombre ya está en uso por otro registro.'
    ];

    // Validación adicional para la tabla 'proveedores'
    if ($this->tableName === 'proveedores') {
        $validatorData['number'] = $number;
        $validatorRules['number'] = 'required|unique:' . $this->tableName . ',numero,' . $id;
        $validatorMessages['number.required'] = 'El campo número es obligatorio.';
        $validatorMessages['number.unique'] = 'El número ya está en uso por otro registro.';
    }

    // Realizar la validación
    $validator = Validator::make($validatorData, $validatorRules, $validatorMessages);

    // Verificar si la validación falla
    if ($validator->fails()) {
        $this->dispatch('ValidationError_' . $this->componentId, message: $validator->errors()->first());
        return;
    }

    // Preparar los datos para la actualización
    $dataToUpdate = ['nombre' => $name];
    if ($this->tableName === 'proveedores') {
        $dataToUpdate['numero'] = $number;
    }

    // Actualizar el registro en la base de datos
    DB::table($this->tableName)->where('id', $id)->update($dataToUpdate);

    // Recargar los registros y despachar eventos
    $this->loadRecords();
    $this->dispatch('ValidationSuccessEdit_' . $this->componentId, message: "Exitoso!");
    $this->dispatch('LoadOptions', records: $this->records, selectedRecord: $this->selectedRecord,
        componentId: $this->componentId);
}


    public function deleteRecord($id)
    {
        $record = DB::table($this->tableName)->find($id);
        if (!$record) {
            // Si el registro no existe, lanzar un mensaje de error personalizado
            $this->dispatch('ValidationError_' . $this->componentId, message: 'El registro que intentas eliminar no existe.');
            return;
        }
        DB::table($this->tableName)->where('id', $id)->delete();
        $this->loadRecords();
        $this->dispatch('ValidationSuccessDelete_' . $this->componentId, message: "Exitoso!");
        $this->dispatch('LoadOptions', records: $this->records, selectedRecord: "No",
        componentId: $this->componentId);
    }

    public function render()
    {
       
        return view('livewire.multi-option-select');
    }
}