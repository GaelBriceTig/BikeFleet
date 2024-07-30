<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Services\CustomerService;
use App\Models\Role;
use Livewire\Component;
use function PHPUnit\Framework\isNull;

class CustomerForm extends Component
{
    public Customer $customer;

    public string $password_new;
    public string $password_new_confirmation;

    public bool $creating = false;

    protected function rules()
    {
        if ($this->creating) {
            $rules = [
                'customer.firstname' => 'required|string',
                'customer.lastname' => 'required|string',
                'customer.email' => 'required|email',
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
                'customer.firstname' => 'required|string',
                'customer.lastname' => 'required|string',
                'customer.email' => 'required|email'
            ];
        }
        return $rules;
    }

    public function mount()
    {
        if (is_null($this->customer->id)) {
            $this->password_new = "";
            $this->password_new_confirmation = "";
        } else {
        }
    }

    public function save()
    {
//        dump($this->customer->firstname);
//        dump($this->customer->lastname);
//        dump($this->customer->email);
//        dump($this->password_new);
//        dump($this->password_new_confirmation);

        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Do your thing and use $validator here
            $validator = $e->validator;

            // ...

            // Once you're done, re-throw the exception
            throw $e;
        }



        if (is_null($this->customer->id)) {
            CustomerService::createCustomer($this);

        } else {
            $this->customer->save();
        }
        $this->emit('customerUpdated');
    }


    public function render()
    {
        return view('livewire.customer-form', [
            'roles' => Role::all()
        ]);
    }
}
