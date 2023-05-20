<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DroneRequest extends FormRequest
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
            
            'drone_type' => "requiersd",
            'drone_name' => "requiersd",
            'battery' => "requiersd",
            'playload_capacity' => "requiersd",
            'user_id' => "requiersd",
            'plan_id' => "requiersd",
        ];
    }
}
