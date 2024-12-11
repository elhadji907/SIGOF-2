<?php

namespace App\Http\Controllers;

use App\Models\Nommination;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NomminationController extends Controller
{
    
    public function index()
    {
        $nomminations = Nommination::orderBy('created_at', 'desc')->get();
        return view("employes.nomminations.index", compact('nomminations'));
    }
    
    public function create()
    {
        return view("employes.nomminations.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [         
            'nomminations.*.name' => 'required|unique:nomminations,name'
        ]);

        
        foreach ($request->nomminations as $key => $value) {
            Nommination::create($value);
        }

        return redirect()->route("nomminations.create")->with("status", "nommination ajoutée avec succès");
    }

    public function edit($id)
    {
        $nommination = Nommination::find($id);
        return view("employes.nomminations.update", compact('nommination'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', Rule::unique(Nommination::class)->ignore($id)]
        ]);

        Nommination::find($id)->update([
            'name' => $request->name
        ]);

        $nomminations = Nommination::get();
        $mesage = "La nommination a été modifiée";
        return redirect()->route("nomminations.index", compact('nomminations'))->with("status", $mesage);
    }

    public function destroy($id)
    {
        $nommination = Nommination::find($id);
        $nommination->delete();
        $mesage = "La nommination " . $nommination->name . ' a été supprimée';
        return redirect()->back()->with("danger", $mesage);
    }
}
