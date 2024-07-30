<?php
namespace App\Services;
use App\Models\User;
use App\Http\Livewire\UserForm;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function createUser(UserForm $userForm)
    {
        $userForm->user->fillable(array_merge($userForm->user->getFillable(), ["password"]));
        $userForm->user->fill([
            'name' => $userForm->user->name,
            'email' => $userForm->user->email,
            'password' => Hash::make($userForm->password_new),
            'role_id' => $userForm->roleId
        ]);
        $userForm->user->save();
    }

    public static function disableUser($id)
    {
        $user = User::find($id);
        $user->disabled = true;
        $user->save();
    }

    public static function enableUser($id)
    {
        $user = User::find($id);
        $user->disabled = false;
        $user->save();
    }
    
}
