<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartementController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin']);
        /* $this->middleware(['permission:arrive-show']); */
        // or with specific guard
        /* $this->middleware(['role_or_permission:super-admin']); */
    }
    public function index()
    {
        $departements = Departement::orderBy("created_at", "desc")->get();
        return view("localites.departements.index", compact("departements"));
    }

    public function create()
    {
        $regions = Region::orderBy("created_at", "desc")->get();
        return view("localites.departements.create", compact("regions"));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nom" => "required|string|unique:departements,nom,except,id",
            "region" => "required|string",
        ]);

        $departement = Departement::create([
            "nom" => $request->input("nom"),
            "regions_id" => $request->input("region"),
        ]);

        $departement->save();

        $status = "Département " . $departement->nom . " ajouté avec succès";

        return  redirect()->route("departements.index")->with("status", $status);
    }

    public function edit($id)
    {
        $departement = Departement::find($id);
        $regions = Region::orderBy("created_at", "desc")->get();
        return view("localites.departements.update", compact("departement", "regions"));
    }
    public function update(Request $request, $id)
    {
        $departement = Departement::find($id);
        $this->validate($request, [
            'nom' => ['required', 'string', 'max:25', Rule::unique(Departement::class)->ignore($id)],
            "region" => ['required', 'string'],
        ]);

        $departement->update([
            'nom' => $request->nom,
            'regions_id' => $request->region,
        ]);

        $mesage = 'Le département ' . $departement->nom . '  a été modifié';

        return redirect()->route("departements.index")->with("status", $mesage);
    }
    public function show($id)
    {
        $departement = Departement::find($id);
        return view("localites.departements.show", compact("departement"));
    }
    public function destroy($id)
    {
        $departement = Departement::find($id);
        $departement->delete();
        $status = "Département " . $departement->nom . " vient d'être supprimé";
        return redirect()->route("departements.index")->with('status', $status);
    }
}
