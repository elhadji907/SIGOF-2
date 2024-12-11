<?php

namespace App\Http\Controllers;

use App\Models\Operateurlocalite;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OperateurlocaliteController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"        =>      ["required", "string"],
            "region"      =>      ["required", "string"],
        ]);

        $operateurlocalite = Operateurlocalite::create([
            "name"              => $request->input("name"),
            "region"            => $request->input("region"),
            "operateurs_id"     => $request->input("operateur"),
        ]);

        $operateurlocalite->save();

        Alert::success('Félicitation !', 'Enregistrement effectué');

        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name"        =>      ["required", "string"],
            "region"      =>      ["required", "string"],
        ]);

        $operateurlocalite = Operateurlocalite::findOrFail($id);
        if ($operateurlocalite->operateur->statut_agrement != 'nouveau') {
            Alert::warning('Attention ! ', 'action impossible');
            return redirect()->back();
        } 
        $operateurlocalite->update([
            "name"              => $request->input("name"),
            "region"            => $request->input("region"),
            "operateurs_id"     => $request->input("operateur"),
        ]);

        $operateurlocalite->save();

        Alert::success('Félicitation !', 'Modification effectuée');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $operateurlocalite = Operateurlocalite::find($id);
        if ($operateurlocalite->operateur->statut_agrement != 'nouveau') {
            Alert::warning('Attention ! ', 'action impossible');
            return redirect()->back();
        } else {
            $operateurlocalite->delete();

            Alert::success("Fait ! ", 'la localité a été supprimée avec succès');
            return redirect()->back();
        }
    }
}
