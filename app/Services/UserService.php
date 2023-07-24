<?php

namespace App\Services;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserService
{
    /**
     * Store a newly created resource in storage.
     *
     * @return array
     */
    public function store(array $data)
    {
        $request = new UserStoreRequest();
        $validator = Validator::make($data, $request->rules());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        collect($data['users'])->map(function (array $userData) {
            $name = $userData['name'];
            $email = $userData['email'];
            $password = $userData['password'];

            User::create([
                'name'      => $name, 
                'email'     => $email,
                'password'  => $password

            ]);
        });

        return [
            'message' => 'Users successfully processed'
        ];
    }

    
}
