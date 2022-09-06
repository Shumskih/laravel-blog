<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле не должно быть пустым',
            'name.string' => 'Имя должно быть строкой',
            'email.required' => 'Поле не должно быть пустым',
            'email.string' => 'Почта должна быть строкой',
            'email.email' => 'Некорректный адрес электронной почты',
            'email.unique' => 'Пользователь с таким email уже существует'
        ];
    }
}
