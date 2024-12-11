<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileOperateurUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'cin'                       => ['nullable', 'string', 'min:13', 'max:15', Rule::unique(User::class)->ignore($this->user()->id)],
            'operateur'                 => ['required', 'string', Rule::unique(User::class)->ignore($this->user()->id)],
            'username'                  => ['required', 'string'],
            'civilite'                  => ['required', 'string', 'max:8'],
            'firstname'                 => ['required', 'string', 'max:150'],
            'name'                      => ['required', 'string', 'max:25'],
            'date_naissance'            => ['nullable', 'string'],
            'lieu_naissance'            => ['nullable', 'string'],
            'categorie'                 => ['required', 'string'],
            'rccm'                      => ['required', 'string'],
            'ninea'                     => ['required', 'string', Rule::unique(User::class)->ignore($this->user()->id)],
            'image'                     => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'email'                     => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'email_responsable'         => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'telephone'                 => ['required', 'string', 'max:9', 'min:9'],
            'telephone_parent'          => ['required', 'string', 'max:9', 'min:9'],
            'adresse'                   => ['required', 'string', 'max:255'],
            'situation_familiale'       => ['nullable', 'max:15', 'string'],
            'situation_professionnelle' => ['nullable', 'max:25', 'string'],
            'fonction_responsable'      => ['required', 'max:250', 'string'],
            'twitter'                   => ['nullable', 'string', 'max:255'],
            'facebook'                  => ['nullable', 'string', 'max:255'],
            'instagram'                 => ['nullable', 'string', 'max:255'],
            'linkedin'                  => ['nullable', 'string', 'max:255'],
            'web'                       => ['nullable', 'string', 'max:255'],
            'fixe'                      => ['string', 'string', 'max:255'],
            'statut'                    => ['string', 'string', 'max:255'],
        ];
    }
}
