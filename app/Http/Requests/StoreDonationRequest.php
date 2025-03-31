<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'compaign_id' => 'required|exists:compaigns,id',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|in:mpesa,card,cash',
            'phone_number' => 'required_if:payment_method,mpesa|numeric|digits_between:9,15',
        ];
    }
}
