<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'preview_image' => ['required', 'file'],
            'main_image' => ['required', 'file'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'tag_ids' => ['nullable', 'array'],
            'tag_ids.*' => ['nullable', 'integer', 'exists:tags,id']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Это должна быть строка',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Это должен быть текст',
            'preview_image.required' => 'Вы не выбрали изображение',
            'preview_image.file' => 'Необходимо выбрать изображение',
            'main_image.required' => 'Вы не выбрали изображение',
            'main_image.file' => 'Необходимо выбрать изображение',
            'category_id.required' => 'Необходимо выбрать категорию',
            'category_id.integer' => 'ID категории должен быть числом',
            'category_id.exists' => 'Категория должна присутствовать в базе',
            'tag_ids.array' => 'Это должен быть массив данных'
        ];
    }
}
