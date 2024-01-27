<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productrequest extends FormRequest
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
            'product_name' => 'required|regex:/^[A-Za-z\s]+$/',
            'description' => 'required|regex:/^[A-Za-z\s]+$/',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|required', 
            'category_id' => 'required|numeric|exists:categories,id',
        ];
    }

  
    
}
