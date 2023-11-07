<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required| email| unique:users',
            'login' => 'required| unique:users| max: 60',
            'password' => 'required| min: 8',
            'password_r' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'E-mail был введён некорректно',
            'email.unique' => 'Этот E-mail уже занят',
            'login.unique' => 'Этот логин уже занят',
            'login.max' => 'Слишком длинный ник, не больше 60 символов',
            'password.min' => 'Пароль должен быть не менее 8 символов',
            'password_r.same' => 'Пароли не совпадают',
            '*.required' => 'Поле необходимо заполнить'
        ];
    }
}
