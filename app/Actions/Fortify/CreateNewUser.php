<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\DB;

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
        $validate_student = [
            'name' => ['required', 'string', 'max:25'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => ['required'],
            'course' => ['required'],
            'password' => ['required','string','min:5']
        ];
        $validate_teacher= [
            'name' => ['required', 'string', 'max:25'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'phone' => ['required'],
            'expertIn' => ['required'],
            'eq' => ['required'],
            'Address' => ['required'],
             'cv' => ['required'],
            'password' => ['required','string','min:5']
        ];
        if(isset($input['expertIn'])){
            $input['expertIn'] =  json_encode($input['expertIn']);
        }
        if(isset($input['cv'])){
            $cvName = time().'-'.rand(1,99999).'.'.$input['cv']->extension();
            $input['cv']->move(public_path('cv'), $cvName);
            $input['cv'] = $cvName;
        }
        $input['role_name'] = 'Student';
        if(request()->input('group') == 'teacher')  {
            $input['role_name'] = 'Teacher';
            Validator::make($input,$validate_teacher)->validate();
        }
        else Validator::make($input,$validate_student)->validate();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        return $user ;
    }
}
