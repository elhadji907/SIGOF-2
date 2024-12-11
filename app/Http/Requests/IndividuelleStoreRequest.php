<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndividuelleStoreRequest extends FormRequest
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
            /* 'date_depot'                    => ["required", "date"],
            'numero_dossier'                => ["required", "string"], */
            /* 'civilite'                      => ["required", "string"],
            'cin'                           => ["required", "string"],
            'firstname'                     => ['required', 'string', 'max:50'],
            'name'                          => ['required', 'string', 'max:25'],
            'telephone'                     => ['required', 'string', 'max:25', 'min:9'],
            'telephone_secondaire'          => ['required', 'string', 'max:25', 'min:9'],
            'date_naissance'                => ['required', 'date'],
            'lieu_naissance'                => ['string', 'required'], */
            /* 'email'                         => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)], */
            /* 'adresse'                       => ['required', 'string', 'max:255'], */
            'departement'                   => ['required', 'string', 'max:255'],
            'module'                        => ['required', 'string', 'max:255'],
            /* 'situation_professionnelle'     => ['required', 'string', 'max:255'],
            'situation_familiale'           => ['required', 'string', 'max:255'], */
            'niveau_etude'                  => ['required', 'string', 'max:255'],
            'diplome_academique'            => ['required', 'string', 'max:255'],
            'diplome_professionnel'         => ['required', 'string', 'max:255'],
            'projet_poste_formation'        => ['required', 'string', 'max:255'],
        ];
    }
}
