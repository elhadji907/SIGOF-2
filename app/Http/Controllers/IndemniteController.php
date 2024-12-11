<?php

namespace App\Http\Controllers;

use App\Models\Indemnite;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IndemniteController extends Controller
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
        $indemnites = Indemnite::orderBy('created_at', 'desc')->get();
        return view("employes.indemnites.index", compact('indemnites'));
    }
    
    public function create()
    {
        return view("employes.indemnites.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [         
            'indemnites.*.name' => 'required|unique:indemnites,name'
        ]);

        /* dd($request->indemnites); */
        
        foreach ($request->indemnites as $key => $value) {
            Indemnite::create($value);
        }

        /* Indemnite::create([
            "name" => $request->name
        ]); */

        return redirect()->route("indemnites.create")->with("status", "indemnité créée avec succès");
    }

    public function edit($id)
    {
        $indemnite = Indemnite::find($id);
        return view("employes.indemnites.update", compact('indemnite'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', Rule::unique(Indemnite::class)->ignore($id)]
        ]);

        Indemnite::find($id)->update([
            'name' => $request->name
        ]);

        $indemnites = Indemnite::get();
        $mesage = "L'indemnité a été modifiée";
        return redirect()->route("indemnites.index", compact('indemnites'))->with("status", $mesage);
    }

    public function destroy($id)
    {
        $indemnite = Indemnite::find($id);
        $indemnite->delete();
        $mesage = "L'indemnité " . $indemnite->name . ' a été supprimée';
        return redirect()->back()->with("danger", $mesage);
    }
}
