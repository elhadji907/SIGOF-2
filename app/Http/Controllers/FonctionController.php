<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FonctionController extends Controller
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
        $fonctions = Fonction::orderBy('created_at', 'desc')->get();
        return view("employes.fonctions.index", compact('fonctions'));
    }

    public function create()
    {
        return view("employes.fonctions.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            /* 'fonctions.*.name' => 'required|unique:fonctions,name', */
            'fonctions.*.name' => 'required|string',
            'fonctions.*.sigle' => 'required|string'
        ]);

        /* dd($request->fonctions); */

        foreach ($request->fonctions as $key => $value) {
            Fonction::create($value);
        }

        /* Fonction::create([
            "name" => $request->name
        ]); */

        return redirect()->route("fonctions.create")->with("status", "Fonction créée avec succès");
    }

    public function edit($id)
    {
        $fonction = Fonction::find($id);
        return view("employes.fonctions.update", compact('fonction'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            /* 'name' => ['required', 'string', Rule::unique(Fonction::class)->ignore($id)], */
            'name' => ['required', 'string'],
            'sigle' => ['required', 'string']
        ]);

        Fonction::find($id)->update([
            'name' => $request->name,
            'sigle' => $request->sigle
        ]);

        $fonctions = Fonction::get();
        $mesage = 'La fonction a été modifiée';
        return redirect()->route("fonctions.index", compact('fonctions'))->with("status", $mesage);
    }

    public function destroy($id)
    {
        $fonction = Fonction::find($id);
        $fonction->delete();
        $mesage = 'La Fonction ' . $fonction->name . ' a été supprimée';
        return redirect()->back()->with("danger", $mesage);
    }
}
