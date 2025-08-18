<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'title' => 'required|string|max:25',
                'description' => 'required|string',
                'user_id' => 'required|exists:users,id',
            ];
        }

        if ($this->isMethod('put') ) {
            return [
                'title' => 'required|string|max:25',
                'description' => 'required|string',
            ];
        }

        // Default: return empty array if method is not handled
        return [];
    }
}
