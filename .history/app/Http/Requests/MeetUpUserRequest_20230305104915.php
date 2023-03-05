<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetUpUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
        ];

        return [
            'email_address' => 'required|unique:meet_up_users',
            'phone_number' => 'required|unique:meet_up_users',
        ];
    }
}
