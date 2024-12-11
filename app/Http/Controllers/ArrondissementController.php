<?php

namespace App\Http\Controllers;

use App\Models\Arrondissement;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArrondissementController extends Controller
{
    public function index()
    {
        $arrondissements = Arrondissement::orderBy("created_at", "desc")->get();

        return view("localites.arrondissements.index", compact("arrondissements"));
    }

    public function create()
    {
        $departements = Departement::orderBy("created_at", "desc")->get();
        return view("localites.arrondissements.create", compact("departements"));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nom" => "required|string|unique:arrondissements,nom,except,id",
            "departement" => "required|string",
        ]);

        $arrondissement = Arrondissement::create([
            "nom" => $request->input("nom"),
            "departements_id" => $request->input("departement"),
        ]);

        $arrondissement->save();

        $status = "Arrondissement de " . $arrondissement->nom . " ajouté avec succès";

        return  redirect()->route("arrondissements.index")->with("status", $status);
    }

    
    public function edit($id)
    {
        $arrondissement = Arrondissement::find($id);
        $departements = Departement::orderBy("created_at", "desc")->get();
        return view("localites.arrondissements.update", compact("arrondissement", "departements"));
    }
    public function update(Request $request, $id)
    {
        $arrondissement = Arrondissement::find($id);
        $this->validate($request, [
            'nom' => ['required', 'string', 'max:25', Rule::unique(Arrondissement::class)->ignore($id)],
            "departement" => ['required', 'string'],
        ]);

        $arrondissement->update([
            'nom' => $request->nom,
            'departements_id' => $request->departement,
        ]);

        $mesage = 'Arrondieement de ' . $arrondissement->nom . '  a été modifié';

        return redirect()->route("arrondissements.index")->with("status", $mesage);
    }
    public function show($id)
    {
        $arrondissement = Arrondissement::find($id);
        return view("localites.arrondissements.show", compact("arrondissement"));
    }
    public function destroy($id)
    {
        $arrondissement = Arrondissement::find($id);
        $arrondissement->delete();
        $status = "Arrondissement de " . $arrondissement->nom . " vient d'être supprimé";
        return redirect()->route("arrondissements.index")->with('status', $status);
    }
}
