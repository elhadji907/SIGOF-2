<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartStoreRequest extends FormRequest
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
            "date_depart"           => ["required", "date"],
            "date_corres"           => ["required", "date"],
            "numero_correspondance" => ["required", "string", "min:4", "max:6", "unique:courriers,numero,Null,id,deleted_at,NULL"],
            "numero_depart"         => ["required", "string", "min:4", "max:6", "unique:departs,numero,Null,id,deleted_at,NULL"],
            "annee"                 => ["required", "string"],
            "objet"                 => ["required", "string"],
            "destinataire"          => ["required", "string"],
            "numero_reponse"        => ["string", "min:4", "max:6","nullable", "unique:courriers,numero_reponse,Null,id,deleted_at,NULL"],
            "date_reponse"          => ["nullable", "date"],
        ];
    }
}
