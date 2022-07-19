<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'category',
            'message' => 'required|min:15|max:500',
            'file' => 'required|max:10240',   
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Поле Название является обязательным',
            'category.required' => 'Поле Категория является обязательным',
            'message.required' => 'Поле Описание сообщения является обязательным',
        ];
    }
}
