<?php

namespace App\Http\Controllers;

use App\Models\Procesverbal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProcesverbalController extends Controller
{

    
    public function index()
    {
        $procesverbals = Procesverbal::orderBy('created_at', 'desc')->get();
        return view("employes.procesverbals.index", compact('procesverbals'));
    }
    
    public function create()
    {
        return view("employes.procesverbals.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [         
            'procesverbals.*.name' => 'required|unique:procesverbals,name'
        ]);

        /* dd($request->procesverbals); */
        
        foreach ($request->procesverbals as $key => $value) {
            Procesverbal::create($value);
        }

        /* Procesverbal::create([
            "name" => $request->name
        ]); */

        return redirect()->route("procesverbals.create")->with("status", "procès verbal créé avec succès");
    }

    public function edit($id)
    {
        $procesverbal = Procesverbal::find($id);
        return view("employes.procesverbals.update", compact('procesverbal'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', Rule::unique(Procesverbal::class)->ignore($id)]
        ]);

        Procesverbal::find($id)->update([
            'name' => $request->name
        ]);

        $procesverbals = Procesverbal::get();
        $mesage = 'Le procès verbal a été modifié';
        return redirect()->route("procesverbals.index", compact('procesverbals'))->with("status", $mesage);
    }

    public function destroy($id)
    {
        $procesverbal = Procesverbal::find($id);
        $procesverbal->delete();
        $mesage = 'Le procès verbal ' . $procesverbal->name . ' a été supprimé';
        return redirect()->back()->with("danger", $mesage);
    }
}
