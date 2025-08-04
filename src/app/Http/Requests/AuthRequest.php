<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $type = $this->input('type');

        return match ($type) {
            'email' => [
                'type' => 'required|in:email',
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:6',
            ],
            'mobile' => [
                'type' => 'required|in:mobile',
                'mobile' => 'required|digits:11|unique:users',
                'otp' => 'required|min:6',
            ],
            'google' => [
                'type' => 'required|in:google',
                'token' => 'required|url',
            ],
            default => [
                'type' => 'required|in:email,mobile,google'
            ],
        };
    }

}
