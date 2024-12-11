<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'email'     => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'username'  => ['required', 'string', 'lowercase', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'firstname' => ['required', 'string', 'max:150'],
            'name'      => ['required', 'string', 'max:25'],
            'image'     => ['string', 'max:255', 'nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'telephone' => ['required', 'string', 'max:9', 'min:9'],
            'adresse'   => ['required', 'string', 'max:255'],
            'password'  => ['string', 'max:255', 'nullable'],
            'roles.*'   => ['string', 'max:255', 'nullable', 'max:255'],
        ];
    }
}
