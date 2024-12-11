<?php

namespace App\Http\Controllers;

use App\Models\Loi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoiController extends Controller
{
    
    public function index()
    {
        $lois = Loi::orderBy('created_at', 'desc')->get();
        return view("employes.lois.index", compact('lois'));
    }
    
    public function create()
    {
        return view("employes.lois.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [         
            'lois.*.name' => 'required|unique:lois,name'
        ]);

        /* dd($request->lois); */
        
        foreach ($request->lois as $key => $value) {
            Loi::create($value);
        }

        /* Loi::create([
            "name" => $request->name
        ]); */

        return redirect()->route("lois.create")->with("status", "loi créée avec succès");
    }

    public function edit($id)
    {
        $loi = Loi::find($id);
        return view("employes.lois.update", compact('loi'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', Rule::unique(Loi::class)->ignore($id)]
        ]);

        Loi::find($id)->update([
            'name' => $request->name
        ]);

        $lois = Loi::get();
        $mesage = 'La loi a été modifiée';
        return redirect()->route("lois.index", compact('lois'))->with("status", $mesage);
    }

    public function destroy($id)
    {
        $loi = Loi::find($id);
        $loi->delete();
        $mesage = 'La loi ' . $loi->name . ' a été supprimée';
        return redirect()->back()->with("danger", $mesage);
    }
}
