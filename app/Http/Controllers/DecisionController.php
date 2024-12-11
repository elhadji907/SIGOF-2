<?php

namespace App\Http\Controllers;

use App\Models\Decision;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DecisionController extends Controller
{

    
    public function index()
    {
        $decisions = Decision::orderBy('created_at', 'desc')->get();
        return view("employes.decisions.index", compact('decisions'));
    }
    
    public function create()
    {
        return view("employes.decisions.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [         
            'decisions.*.name' => 'required|unique:decisions,name'
        ]);

        /* dd($request->decisions); */
        
        foreach ($request->decisions as $key => $value) {
            Decision::create($value);
        }

        /* Decision::create([
            "name" => $request->name
        ]); */

        return redirect()->route("decisions.create")->with("status", "décision créée avec succès");
    }

    public function edit($id)
    {
        $decision = Decision::find($id);
        return view("employes.decisions.update", compact('decision'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', Rule::unique(Decision::class)->ignore($id)]
        ]);

        Decision::find($id)->update([
            'name' => $request->name
        ]);

        $decisions = Decision::get();
        $mesage = 'La décision a été modifiée';
        return redirect()->route("decisions.index", compact('decisions'))->with("status", $mesage);
    }

    public function destroy($id)
    {
        $decision = Decision::find($id);
        $decision->delete();
        $mesage = 'La décision ' . $decision->name . ' a été suppriméé';
        return redirect()->back()->with("danger", $mesage);
    }
}
