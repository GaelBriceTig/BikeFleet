<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Services\UserService;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public User $newUser;
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
        'userUpdated' => 'onUserUpdated'
    ];

    public function mount()
    {
        $this->newUser = new User();
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
            UserService::disableUser($value);
        }
        $this->emit('userUpdated');
    }

    public function enableSelection()
    {
        foreach ($this->selection as $key => $value) {
            UserService::enableUser($value);
        }
        $this->emit('userUpdated');
    }

    public function render()
    {
        $users = User::query();

        foreach ($this->selection as $selectedId) {
            $currentUser = User::find($selectedId);
            if ($currentUser->disabled) {
                $this->anyDisabled = true;
            }
        }

        if (!$this->showDisabled) {
            $users->where('disabled', 0);
        }
        return view('livewire.users-table', [
            'users' => $users
                ->where('name', 'LIKE', "%{$this->search}%")
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(20)
        ]);
    }

    public function startEdit(int $id)
    {
        $this->isCreating = false;
        $this->editId = $id;
    }

    public function onUserUpdated()
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
