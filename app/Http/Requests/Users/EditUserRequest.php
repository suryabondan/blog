<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class EditUserRequest extends FormRequest
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
        $rules = [
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email,' . $this->id,

        ];

        if (!empty($this->request->get('password'))) {
            $rules += ['password' => 'required|min:8|same:password_confirmation'];
        }

        return $rules;
    }

    public function getEditedUser()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if (!empty($this->password)) {
            $data += ['password' => Hash::make($this->password)];
        }

        return $data;
    }
}
