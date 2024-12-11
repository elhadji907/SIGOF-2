<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\User;
use Illuminate\Http\Request;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname'     => ['required', 'string', 'max:150'],
            'name'          => ['required', 'string', 'max:25'],
            'username'      => ['required', 'string', 'lowercase', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'cin'           => ['nullable', 'string', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'image'         => ['image', 'max:255', 'nullable', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'telephone'     => ['required', 'string', 'max:9', 'min:9'],
            'adresse'       => ['required', 'string', 'max:255'],
            'password'      => ['string', 'max:255', 'nullable'],
            'roles.*'       => ['string', 'max:255', 'nullable', 'max:255'],
        ];
    }
}
