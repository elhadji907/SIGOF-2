<?php

namespace App\Http\Controllers;

use App\Models\Operateurequipement;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OperateurequipementController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            "designation"     =>      ["required", "string"],
            "quantite"        =>      ["required", "string"],
            "etat"            =>      ["required", "string"],
            "type"            =>      ["required", "string"],
        ]);


        $operateurequipement = Operateurequipement::create([
            "designation"       => $request->input("designation"),
            "quantite"          => $request->input("quantite"),
            "etat"              => $request->input("etat"),
            "type"              => $request->input("type"),
            "operateurs_id"     => $request->input("operateur"),
        ]);

        $operateurequipement->save();

        Alert::success('Félicitation !', 'Enregistrement effectué');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "designation"     =>      ["required", "string"],
            "quantite"        =>      ["required", "string"],
            "etat"            =>      ["required", "string"],
            "type"            =>      ["required", "string"],
        ]);

        $operateurequipement = Operateurequipement::findOrFail($id);
        if ($operateurequipement->operateur->statut_agrement != 'nouveau') {
            Alert::warning('Attention ! ', 'action impossible');
            return redirect()->back();
        } 
        $operateurequipement->update([
            "designation"       => $request->input("designation"),
            "quantite"          => $request->input("quantite"),
            "etat"              => $request->input("etat"),
            "type"              => $request->input("type"),
            "operateurs_id"     => $request->input("operateur"),
        ]);

        $operateurequipement->save();

        Alert::success('Félicitation !', 'Modification effectuée');

        return redirect()->back();
    }

    public function show($id)
    {
        $operateurequipement = Operateurequipement::find($id);
        return view('operateurequipements.show', compact('operateurequipement'));
    }

    public function destroy($id)
    {
        $operateurequipement = Operateurequipement::find($id);
        if ($operateurequipement->operateur->statut_agrement != 'nouveau') {
            Alert::warning('Attention ! ', 'action impossible');
            return redirect()->back();
        } else {

            $operateurequipement->delete();

            Alert::success("Fait ! ", 'supprimé avec succès');
            return redirect()->back();
            
        }
    }
}
