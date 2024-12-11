<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Domaine;
use App\Models\Secteur;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class DomaineController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|DIOF|ADIOF']);
        /* $this->middleware(['permission:arrive-show']); */
        // or with specific guard
        /* $this->middleware(['role_or_permission:super-admin']); */
    }
    public function index()
    {
        $secteurs = Secteur::orderBy("created_at", "desc")->get();
        $domaines = Domaine::orderBy("created_at", "desc")->get();
        return view("domaines.index", compact("secteurs", "domaines"));
    }
    public function show($id)
    {
        $domaine = domaine::find($id);
        return view("domaines.show", compact("domaine"));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name"             => ["required", "string", Rule::unique(Domaine::class)->ignore($id)],
            "secteur"          => ["required", "string"],
        ]);

        $domaine = Domaine::findOrFail($id);

        $domaine->update([
            'name'            => $request->input('name'),
            'secteurs_id'     => $request->input('secteur'),
        ]);

        $domaine->save();

        Alert::success('Fait ! ', 'domaine modifié avec succès');

        return redirect()->back();
    }
    public function addDomaine(Request $request)
    {
        $this->validate($request, [
            "name"             => ['required', 'string', Rule::unique(Domaine::class)->whereNull('deleted_at')],
            "secteur"          => ["required", "string"],
        ]);

        $domaine = Domaine::create([
            'name'            => $request->input('name'),
            'secteurs_id'     => $request->input('secteur'),
        ]);

        $domaine->save();

        Alert::success('Fait ! ', 'domaine ajouté avec succès');

        return redirect()->back();
    }
    public function destroy($id)
    {
        $domaine   = Domaine::find($id);

        $domaine->delete();

        Alert::success('Fait !', 'domaine supprimé');

        return redirect()->back();
    }
}
