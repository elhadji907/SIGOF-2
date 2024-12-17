<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterneStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [           
            'date_arrivee'              =>  ["required", "date", "min:10", "max:10", "date_format:d-m-Y"],
            'date_correspondance'       =>  ["required", "date", "min:10", "max:10", "date_format:d-m-Y"],
            'numero_arrive'             =>  ["required", "string", "min:4", "max:6", "unique:internes,numero,Null,id,deleted_at,NULL"],
            'numero_correspondance'     =>  ["required", "string", "min:4", "max:6", "unique:courriers,numero,Null,id,deleted_at,NULL"],
            'annee'                     =>  ['required','numeric','min:2022'],
            'expediteur'                =>  ['required','string','max:200'],
            'objet'                     =>  ['required','string','max:200'],
        ];
    }
}
