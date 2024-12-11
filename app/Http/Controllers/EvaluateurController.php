<?php

namespace App\Http\Controllers;

use App\Models\Evaluateur;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class EvaluateurController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|DIOF|ADIOF|Evaluateur']);
        $this->middleware("permission:evaluateur-view", ["only" => ["index"]]);
        /* $this->middleware(['permission:arrive-show']); */
        // or with specific guard
        /* $this->middleware(['role_or_permission:super-admin']); */
    }
    public function index()
    {
        $evaluateurs = Evaluateur::orderBy("created_at", "desc")->get();

        return view("evaluateurs.index", compact("evaluateurs"));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"              => ["required", "string"],
            "adresse"          => ["required", "string"],
            "fonction"          => ["required", "string"],
            "email"             => ["required", "string", Rule::unique('evaluateurs')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
            "telephone"         => ["required", "string", "min:9", "max:9", Rule::unique('evaluateurs')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
        ]);

        $evaluateur = Evaluateur::create([
            "name"          => $request->input("name"),
            "initiale"      => $request->input("initiale"),
            "fonction"      => $request->input("fonction"),
            "email"         => $request->input("email"),
            "telephone"     => $request->input("telephone"),
            "adresse"    => $request->input("adresse"),
        ]);

        $evaluateur->save();

        Alert::success('Félicitation !', 'Enregistrement effectué');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $evaluateur = Evaluateur::find($id);

        $this->validate($request, [
            "name"          => ['required', 'string', 'max:25'],
            "fonction"      => ['required', 'string', 'max:250'],
            "email"         => ['required', 'string', 'max:25', Rule::unique(Evaluateur::class)->ignore($id)->whereNull('deleted_at')],
            "telephone"     => ['required', 'string', 'max:25', "min:9", "max:9", Rule::unique(Evaluateur::class)->ignore($id)->whereNull('deleted_at')],
            'adresse'     => ['required', 'string', 'max:25'],
        ]);

        $evaluateur->update([
            "name"          => $request->input("name"),
            "fonction"      => $request->input("fonction"),
            "email"         => $request->input("email"),
            "telephone"     => $request->input("telephone"),
            "adresse"     => $request->input("adresse"),
        ]);

        $evaluateur->save();

        Alert::success('Fait ! ', 'modification effectuée');

        return redirect()->back();
    }

    public function show($id)
    {
        $evaluateur          = Evaluateur::findOrFail($id);
        $evaluateurs         = Evaluateur::orderBy("created_at", "desc")->get();
        return view('evaluateurs.show', compact('evaluateur', 'evaluateurs'));
    }
    
    public function destroy($id)
    {
        $evaluateur = Evaluateur::find($id);
        $evaluateur->delete();

        Alert::success('Fait !', 'Suppression effectuée');

        return redirect()->back();
    }
}
