<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class plantRequest extends FormRequest
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
            'name' => 'required| max: 60',
            'price' => 'required',
            'path' => 'required| mimes:jpg,bmp,png',
            'height' => 'required',
            'category' => 'required',
            'light' => 'required',
            'description' => 'required| max: 200'
        ];
    }

    public function messages() {
        return [
            'name.name' => 'Название введено некорректно',
            'path.mimes' => 'Некорректный формат изображения',
            'description.max' => 'Превышено количество символов в описании',
            '*.required' => 'Поле необходимо заполнить'
        ];
    }
}
