<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class SecteurController extends Controller
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

        return view("secteurs.index", compact("secteurs"));
    }


    public function create()
    {
        return view("secteurs.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "secteur" => "required|string|unique:secteurs,name,except,id",
        ]);

        $secteur = Secteur::create([
            "name" => $request->input("secteur"),
        ]);

        $secteur->save();

        /* $status = "Région " . $secteur->nom . " ajoutée avec succès";
        return  redirect()->route("secteurs.index")->with("status", $status); */
        Alert::success('Fait !', 'secteur ajouté avec succès');

        return redirect()->back();
    }

    public function show($id)
    {
        $secteur = Secteur::find($id);
        return view("secteurs.show", compact("secteur"));
    }

    public function edit($id)
    {
        $secteur = Secteur::find($id);
        return view("secteurs.update", compact("secteur"));
    }

    public function update(Request $request, $id)
    {
        $secteur = Secteur::find($id);
        $this->validate($request, [
            'name'    => ['required', 'string', 'max:25', Rule::unique(Secteur::class)->ignore($id)->whereNull('deleted_at')],
        ]);

        $secteur->update([
            'name'       => $request->input('name'),
        ]);

        Alert::success('Fait',  'modifié avec succès');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $secteur = Secteur::find($id);
        $secteur->delete();

        Alert::success('Fait', 'supprimé avec succès');
        return redirect()->back();
    }
}
