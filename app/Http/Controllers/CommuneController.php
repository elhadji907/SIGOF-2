<?php

namespace App\Http\Controllers;

use App\Models\Arrondissement;
use App\Models\Commune;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CommuneController extends Controller
{
    public function index(){
        $communes = Commune::orderBy("created_at", "desc")->get();
        
        return view("localites.communes.index",compact("communes"));
    }

    
    public function create()
    {
        $arrondissements = Arrondissement::orderBy("created_at", "desc")->get();
        return view("localites.communes.create", compact("arrondissements"));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nom" => "required|string|unique:communes,nom,except,id",
            "arrondissement" => "required|string",
        ]);

        $commune = Commune::create([
            "nom" => $request->input("nom"),
            "arrondissements_id" => $request->input("arrondissement"),
        ]);

        $commune->save();

        $status = "commune de " . $commune->nom . " ajouté avec succès";

        return  redirect()->route("communes.index")->with("status", $status);
    }

    
    public function edit($id)
    {
        $commune = Commune::find($id);
        $arrondissements = Arrondissement::orderBy("created_at", "desc")->get();
        return view("localites.communes.update", compact("commune", "arrondissements"));
    }
    public function update(Request $request, $id)
    {
        $commune = Commune::find($id);
        $this->validate($request, [
            'nom' => ['required', 'string', 'max:25', Rule::unique(Commune::class)->ignore($id)],
            "arrondissement" => ['required', 'string'],
        ]);

        $commune->update([
            'nom' => $request->nom,
            'arrondissements_id' => $request->arrondissement,
        ]);

        $mesage = 'commune de ' . $commune->nom . '  a été modifié';

        return redirect()->route("communes.index")->with("status", $mesage);
    }
    public function show($id)
    {
        $commune = Commune::find($id);
        return view("localites.communes.show", compact("commune"));
    }
    public function destroy($id)
    {
        $commune = Commune::find($id);
        $commune->delete();
        $status = "commune de " . $commune->nom . " vient d'être supprimé";
        return redirect()->route("communes.index")->with('status', $status);
    }
}
