<?php

namespace App\Http\Controllers;

use App\Models\Operateurformateur;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OperateurformateurController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"                      =>      ["required", "string"],
            "domaine"                   =>      ["required", "string"],
            "nbre_annees_experience"    =>      ["required", "string"],
            "reference"                 =>      ["nullable", "string"],
        ]);


        $operateurformateur = Operateurformateur::create([
            "name"                      => $request->input("name"),
            "domaine"                   => $request->input("domaine"),
            "nbre_annees_experience"    => $request->input("nbre_annees_experience"),
            "references"                => $request->input("reference"),
            "operateurs_id"             => $request->input("operateur"),
        ]);

        $operateurformateur->save();

        Alert::success('Félicitation !', 'Enregistrement effectué');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name"                      =>      ["required", "string"],
            "domaine"                   =>      ["required", "string"],
            "nbre_annees_experience"    =>      ["required", "string"],
            "reference"                 =>      ["nullable", "string"],
        ]);

        $operateurformateur = Operateurformateur::findOrFail($id);
        if ($operateurformateur->operateur->statut_agrement != 'nouveau') {
            Alert::warning('Attention ! ', 'action impossible');
            return redirect()->back();
        } 
        $operateurformateur->update([
            "name"                      => $request->input("name"),
            "domaine"                   => $request->input("domaine"),
            "nbre_annees_experience"    => $request->input("nbre_annees_experience"),
            "references"                => $request->input("reference"),
            "operateurs_id"             => $request->input("operateur"),
        ]);

        $operateurformateur->save();

        Alert::success('Félicitation !', 'Modification effectuée');

        return redirect()->back();
    }

    public function show($id)
    {
        $operateurformateur = Operateurformateur::find($id);
        return view('operateurformateurs.show', compact('operateurformateur'));
    }

    public function destroy($id)
    {
        $operateurformateur = Operateurformateur::find($id);
        if ($operateurformateur->operateur->statut_agrement != 'nouveau') {
            Alert::warning('Attention ! ', 'action impossible');
            return redirect()->back();
        } else {

            $operateurformateur->delete();

            Alert::success("Fait ! ", 'supprimé avec succès');
            return redirect()->back();
        }
    }
}
