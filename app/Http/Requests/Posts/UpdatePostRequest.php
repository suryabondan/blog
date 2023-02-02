<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePostRequest extends FormRequest
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
            'title'   => 'required|string',
            'content' => 'required|string',
        ];
    }

    public function getEditedPost()
    {
        $data = [
            'title'   => $this->title,
            'content' => $this->content,
            'user_id' => Auth::user()->id,
        ];

        return $data;
    }
}
