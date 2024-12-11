<?php

namespace App\Http\Controllers;

use App\Models\Decret;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DecretController extends Controller
{
    
    public function index()
    {
        $decrets = Decret::orderBy('created_at', 'desc')->get();
        return view("employes.decrets.index", compact('decrets'));
    }
    
    public function create()
    {
        return view("employes.decrets.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [         
            'decrets.*.name' => 'required|unique:decrets,name'
        ]);

        /* dd($request->decrets); */
        
        foreach ($request->decrets as $key => $value) {
            Decret::create($value);
        }

        /* Decret::create([
            "name" => $request->name
        ]); */

        return redirect()->route("decrets.create")->with("status", "decret créé avec succès");
    }

    public function edit($id)
    {
        $decret = Decret::find($id);
        return view("employes.decrets.update", compact('decret'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', Rule::unique(Decret::class)->ignore($id)]
        ]);

        Decret::find($id)->update([
            'name' => $request->name
        ]);

        $decrets = Decret::get();
        $mesage = 'Le decret a été modifié';
        return redirect()->route("decrets.index", compact('decrets'))->with("status", $mesage);
    }

    public function destroy($id)
    {
        $decret = Decret::find($id);
        $decret->delete();
        $mesage = 'Le decret ' . $decret->name . ' a été supprimé';
        return redirect()->back()->with("danger", $mesage);
    }
}
