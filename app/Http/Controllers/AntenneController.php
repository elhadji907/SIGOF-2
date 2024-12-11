<?php

namespace App\Http\Controllers;

use App\Models\Antenne;
use App\Models\Employee;
use App\Models\Region;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class AntenneController extends Controller
{
    public function index()
    {
        $antennes = Antenne::orderBy("created_at", "desc")->get();
        $regions = Region::orderBy("created_at", "desc")->get();
        $employe = Employee::orderBy("created_at", "desc")->get();
        return view('antennes.index', compact('antennes', 'employe', 'regions'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"         => "required|string|unique:antennes,name,except,id",
            "code"         => "required|string|unique:antennes,code,except,id",
            "contact"      => "required|string",
            "adresse"      => "required|string",
        ]);

        $antenne = Antenne::create([
            "name"      => $request->input("name"),
            "code"      => $request->input("code"),
            "contact"   => $request->input("contact"),
            "adresse"   => $request->input("adresse"),
            "chef_id"   => $request->input("employe"),
        ]);

        $antenne->save();

        $antenne->regions()->sync($request->input("region"));

        Alert::success('Effectuée ! ', 'antenne ajoutée');

        return  redirect()->back();
    }

    public function edit($id)
    {
        $regions = Region::orderBy("created_at", "desc")->get();

        $employe = Employee::orderBy("created_at", "desc")->get();

        $antenne = Antenne::findOrFail($id);

        $antenneRegion = $antenne->regions->pluck('id', 'id')->all();

        return view("antennes.update", compact(
            'antenne',
            'regions',
            'employe',
            'antenneRegion'
        ));
    }

    public function update(Request $request, $id)
    {
        $antenne = Antenne::findOrFail($id);

        $this->validate($request, [
            "name"           => ['required', 'string', Rule::unique(Antenne::class)->ignore($id)],
            "code"         => ['required', 'string', Rule::unique(Antenne::class)->ignore($id)],
            "contact"      => "required|string",
            "adresse"      => "required|string",
        ]);

        $antenne->update([
            "name"      => $request->input("name"),
            "code"      => $request->input("code"),
            "contact"   => $request->input("contact"),
            "adresse"   => $request->input("adresse"),
            "chef_id"   => $request->input("employe"),
        ]);

        $antenne->save();

        $antenne->regions()->sync($request->input("region"));

        Alert::success('Félicitations ! ', 'Modification effectuée');

        return  redirect()->back();
    }
    public function destroy($id)
    {
        $antenne = Antenne::findOrFail($id);
        $antenne->regions()->detach($id);
        $antenne->delete();
        Alert::success('Effectué !', 'antenne supprimée avec succès');
        return redirect()->back();
    }
}
