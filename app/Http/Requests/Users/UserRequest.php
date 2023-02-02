<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|string',
            'username' => 'required|string|unique:users',
            'roles'    => 'required|string',
            'password' => 'required|min:8|same:password_confirmation',
        ];
    }

    public function getUser()
    {
        $data = [
            'name' => $this->name,
            'username' => $this->username,
            'roles' => $this->roles,
            'password' => Hash::make($this->password),
        ];

        return $data;
    }
}
