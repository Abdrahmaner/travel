<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nom' => ['required'],
            'tel' => ['required'],
            'email' => [
                'required',
                'email',
                Rule::unique(User::class),
            ],
            'ville' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();

       return User::create([
            'nom' => $input['nom'],
            'tel' => $input['tel'],
            'email' => $input['email'],
            'ville' => $input['ville'],
            'password' => Hash::make($input['password']),
            'role' => $input['role'],
        ]);
      
        
    }
}
