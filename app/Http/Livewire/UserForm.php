<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Services\UserService;
use App\Models\Role;
use Livewire\Component;
use function PHPUnit\Framework\isNull;

class UserForm extends Component
{
    public User $user;

    public string $password_new;
    public string $password_new_confirmation;
    public int $roleId;

    public bool $creating = false;

    protected function rules()
    {
        if ($this->creating) {
            $rules = [
                'user.name' => 'required|string',
                'user.email' => 'required|email',
                'roleId' => 'required|integer|min:1',
                'password_new' => [
                    'required',
                    'min:8',
                    'max:15',
                    'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}$/',
                    'confirmed'
                ],
                'password_new_confirmation' => ['required', 'same:password_new'],
            ];
        } else {
            $rules = [
                'user.name' => 'required|string',
                'user.email' => 'required|email',
                'roleId' => 'required|integer|min:1'
            ];
        }
        return $rules;
    }

    public function mount()
    {
        if (is_null($this->user->id)) {
            $this->password_new = "";
            $this->password_new_confirmation = "";
            $this->roleId = -1;
        } else {
            $this->roleId = $this->user->role_id;
        }
    }

    public function save()
    {
        $this->validate();
        if (is_null($this->user->id)) {
            UserService::createUser($this);
        } else {
            $this->user->save();
        }
        $this->emit('userUpdated');
    }


    public function render()
    {
        return view('livewire.user-form', [
            'roles' => Role::all()
        ]);
    }
}
