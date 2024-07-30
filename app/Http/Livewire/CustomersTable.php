<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Services\CustomerService;
use Livewire\WithPagination;

class CustomersTable extends Component
{
    use WithPagination;

    public Customer $newCustomer;
    public int $editId = 0;
    public string $search = "";
    public string $orderField = "";
    public string $orderDirection = "ASC";
    public array $selection = [];
    public bool $isCreating = false;
    public bool $showDisabled = false;
    public bool $anyDisabled = false;

    protected $queryString = [
        'search' => ['except' => '']
    ];

    protected $listeners = [
        'customerUpdated' => 'onCustomerUpdated'
    ];

    public function mount()
    {
        $this->newCustomer = new Customer();
    }

    public function setOrderField(string $name)
    {
        if ($name === $this->orderField) {
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC' : 'ASC';
        } else {
            $this->orderField = $name;
            $this->reset('orderDirection');
        }
    }

    public function disableSelection()
    {
        foreach ($this->selection as $key => $value) {
            CustomerService::disableCustomer($value);
        }
        $this->emit('userUpdated');
    }

    public function enableSelection()
    {
        foreach ($this->selection as $key => $value) {
            CustomerService::enableCustomer($value);
        }
        $this->emit('userUpdated');
    }

    public function render()
    {
        $customers = Customer::query();

        foreach ($this->selection as $selectedId) {
            $currentCustomer = Customer::find($selectedId);
            if ($currentCustomer->disabled) {
                $this->anyDisabled = true;
            }
        }

        if (!$this->showDisabled) {
            $customers->where('disabled', 0);
        }
        return view('livewire.customers-table', [
            'customers' => $customers
                ->where('firstname', 'LIKE', "%{$this->search}%")
                ->orWhere('lastname', 'LIKE', "%{$this->search}%")
                ->orWhere('email', 'LIKE', "%{$this->search}%")
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(20)
        ]);
    }

    public function startEdit(int $id)
    {
        $this->isCreating = false;
        $this->editId = $id;
    }

    public function onCustomerUpdated()
    {
        $this->isCreating = false;
        $this->reset('editId');
        $this->selection = [];
        $this->anyDisabled = false;
    }

    public function startCreate()
    {
        $this->editId = 0;
        $this->isCreating = true;
    }
}
