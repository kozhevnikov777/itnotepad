<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для запонения',
            'title.string' => 'Данные должы соответствовать строчному типу',
            'content.required' => 'Это поле необходимо для запонения',
            'content.string' => 'Данные должы соответствовать строчному типу',
            'category_id.required' => 'Это поле необходимо для запонения',
            'category_id.integer' => 'ID категории должен быть числом',
            'category_id.exists' => 'ID категории должен быть в базе данных',
            'tag_ids.array' => 'Необходимо отправить массив данных',
            'start_time.required' => 'Это поле необходимо для запонения',
            'start_time.string' => 'Данные должы соответствовать строчному типу',
            'end_time.required' => 'Это поле необходимо для запонения',
            'end_time.string' => 'Данные должы соответствовать строчному типу',
        ];
    }
}
