<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Projetlocalite;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class ProjetlocaliteController extends Controller
{
    public function showLocalites($id)
    {
        $projetlocalites = Projetlocalite::where('projets_id', $id)->get();
        $projet = Projet::findOrFail($id);

        return view('projetlocalites.index', compact('projetlocalites', 'projet'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'localite'                   => ["required", "string", Rule::unique('projetlocalites')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
            'effectif'                  => 'required|string',
        ]);

        $projetlocalite = new Projetlocalite([
            "localite"              =>  $request->input("localite"),
            "effectif"              =>  $request->input("effectif"),
            'projets_id'            =>  $request->input('projet'),
        ]);

        $projetlocalite->save();

        Alert::success('Féliciations ! ', 'localité ajoutée avec succès');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'localite'                  => ["required", "string", Rule::unique('projetlocalites')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })->ignore($id)],
            'effectif'                  => 'required|string',
        ]);

        $projetlocalite = Projetlocalite::findOrFail($id);

        $projetlocalite->update([
            "localite"                =>  $request->input("localite"),
            "effectif"              =>  $request->input("effectif"),
            'projets_id'              =>  $request->input('id'),
        ]);

        $projetlocalite->save();

        Alert::success('Féliciations ! ', 'localité modifiée avec succès');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $projetlocalite = Projetlocalite::findOrFail($id);

        $projetlocalite->delete();

        Alert::success('Fait ! ', 'localité supprimée avec succès');

        return redirect()->back();
    }
}
