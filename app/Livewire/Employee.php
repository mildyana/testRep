<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Employee extends Component
{
    
    use WithPagination, WithoutUrlPagination;

    public $perPage =10;
    public $search = '';
    public $sortDirection = "ASC";
    public $sortColumn = "name";

    #[Rule(['required', 'max:255'])]
    public $name;

    #[Rule(['required'])]
    public $division;

    public function createNewEmployee()
    {
        
        $validated = $this->validate();

        \App\Models\Employee::create([
            'name'=> $validated['name'],
            'division'=> $validated['division']
        ]);

        $this->reset(['name', 'division']);

        session()->flash('success', 'Employee Created Successfully!');

    }

    // life cycle hooks
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function doSort($column)
    {
        if($this->sortColumn ===$column)
        {
            $this->sortDirection = ($this->sortDirection == 'ASC')? 'DESC':'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirection = 'ASC';
    }

    public function render()
    {


        $employees = \App\Models\Employee::search($this->search)
        ->orderby($this->sortColumn, $this->sortDirection)
        ->paginate($this->perPage);

        return view('livewire.employee', [
            'employees' => $employees
                        
        ]);
    }
}
