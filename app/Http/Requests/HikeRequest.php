<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HikeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'map_data' => 'required|string',
            'distance' => 'required|numeric',
            'estimated_duration' => 'required',
            'group_id' => 'nullable|exists:groups,id',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
