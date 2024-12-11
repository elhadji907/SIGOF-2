<?php

namespace App\Http\Controllers;

use App\Models\Collectivemodule;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class CollectivemoduleController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            /* "module_name"             => "required|string|unique:collectivemodules,module,except,id", */
            "module_name"   => "required|string",
        ]);

        $module_collective_total = Collectivemodule::where('collectives_id', $request->input('collectiveid'))->count();

        if ($module_collective_total >= 2) {
            Alert::warning('Attention ! ', 'Vous avez atteint le nombre de modules autoriés');
            return redirect()->back();
        } else {

            $module_find    = DB::table('modules')->where('name', $request->input("module_name"))->first();

            if (isset($module_find)) {
                $collectivemodule = Collectivemodule::create([
                    'module'            => $request->input('module_name'),
                    'statut'            => 'attente',
                    'collectives_id'    => $request->input('collective'),
                ]);
            } else {

                $module = new Module([
                    'name'            => $request->input('module_name'),
                ]);

                $module->save();
                $collectivemodule = Collectivemodule::create([
                    'module'            => $request->input('module_name'),
                    'statut'            => 'attente',
                    'collectives_id'    => $request->input('collective'),
                ]);
            }

            $collectivemodule->save();

            Alert::success('Fait ! ', 'module ajouté avec succès');
        }



        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            /* "module_name"             => "required|string|unique:collectivemodules,module,except,id", */
            "module_name"   => "required|string",
        ]);

        $collectivemodule   = Collectivemodule::find($id);

        if (!empty($collectivemodule->formations_id)) {
            Alert::warning('Désolez ! ', 'action impossible');
            return redirect()->back();
        } else {
            $collectivemodule->update([
                'module'            => $request->input('module_name'),
                'collectives_id'    => $request->input('collective'),
            ]);

            $collectivemodule->save();

            Alert::success('Fait ! ', 'module modifié avec succès');

            return redirect()->back();
        }
    }

    public function show($id)
    {
        $collectivemodule   = Collectivemodule::find($id);
        return view("collectives.showliste", compact('collectivemodule'));
    }

    public function destroy($id)
    {
        $collectivemodule   = Collectivemodule::find($id);

        $collectivemodule->delete();

        Alert::success('module', 'supprimé');

        return redirect()->back();
    }

    public function validerModuleCollective(Request $request)
    {
        $collectivemodule = Collectivemodule::findOrFail($request->id);

        $collectivemodule->update([
            'statut' => 'attente'
        ]);

        $collectivemodule->save();
        Alert::success('Module validé !', 'Merci à bientôt');

        return redirect()->back();
    }

    public function rejeterModuleCollective(Request $request)
    {
        $request->validate([
            'motif' => 'required|string'
        ]);

        $collectivemodule = Collectivemodule::findOrFail($request->id);

        $collectivemodule->update([
            'motif' => $request->motif,
            'statut' => 'rejeter'
        ]);

        $collectivemodule->save();

        Alert::success('Module rejeté !', 'Merci à bientôt');

        return redirect()->back();
    }

    public function supprimerModuleCollective(Request $request)
    {
        $collectivemodule = Collectivemodule::findOrFail($request->id);

        $collectivemodule->update([
            'statut' => 'attente',
            'formations_id' => null
        ]);

        $collectivemodule->save();

        Alert::success('Module supprimer !', 'Merci à bientôt');

        return redirect()->back();
    }
}
