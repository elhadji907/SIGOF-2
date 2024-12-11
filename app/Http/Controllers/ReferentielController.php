<?php

namespace App\Http\Controllers;

use App\Models\Convention;
use App\Models\Referentiel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class ReferentielController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|Demandeur|DIOF|ADIOF|DEC']);
        $this->middleware("permission:referentiel-view", ["only" => ["index"]]);
        $this->middleware("permission:referentiel-create", ["only" => ["create", "store"]]);
        $this->middleware("permission:referentiel-update", ["only" => ["update", "edit"]]);
        $this->middleware("permission:referentiel-show", ["only" => ["show"]]);
        $this->middleware("permission:referentiel-delete", ["only" => ["destroy"]]);
    }
    public function index()
    {
        $referentiels = Referentiel::get();
        $conventions = Convention::get();

        return view('referentiels.index', compact('referentiels', 'conventions'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            "intitule"      => "required|string|unique:referentiels,intitule,except,id",
            "titre"         => "required|string|unique:referentiels,titre,except,id",
            "categorie"     => "nullable|string",
            "reference"     => "nullable|string",
        ]);

        $convention = Convention::where('name', $request?->convention)->first();

        $referentiel = Referentiel::create([
            'intitule'       => $request?->intitule,
            'titre'          => $request?->titre,
            'categorie'      => $request?->categorie,
            'reference'      => $request?->reference,
            'conventions_id' => $convention?->id,
        ]);

        $referentiel?->save();

        Alert::success('Le référentiel ' . $referentiel?->titre, ' a été ajouté avec succès');

        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {

        $referentiel = Referentiel::find($id);
        $conventions = Convention::get();

        return view('referentiels.update', compact('referentiel', 'conventions'));
    }

    public function update(Request $request, $id)
    {
        $referentiel = Referentiel::find($id);

        $this->validate($request, [
            "intitule"      => ['required', 'string', 'max:250', Rule::unique(Referentiel::class)->ignore($id)],
            "titre"         => ['required', 'string', 'max:250', Rule::unique(Referentiel::class)->ignore($id)],
            "categorie"     => ['nullable', 'string'],
            "reference"     => ['nullable', 'string'],
        ]);

        $convention = Convention::where('name', $request?->convention)->first();

        $referentiel->update([
            'intitule'       => $request?->intitule,
            'titre'          => $request?->titre,
            'categorie'      => $request?->categorie,
            'reference'      => $request?->reference,
            'conventions_id' => $convention?->id,
        ]);

        $referentiel->save();

        Alert::success('Le référentiel ' . $referentiel?->titre, ' a été modifié avec succès');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $referentiel = Referentiel::find($id);
        $referentiel->delete();

        Alert::success('Le référentiel ' . $referentiel?->titre, 'a été supprimée avec succès');

        return redirect()->back();
    }
}
