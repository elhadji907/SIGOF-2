<?php

namespace App\Http\Controllers;

use App\Models\Moduleoperateurstatut;
use App\Models\Operateurmodule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ValidationmoduleController extends Controller
{
    public function update($id)
    {
        $operateurmodule   = Operateurmodule::findOrFail($id);

        if ($operateurmodule->statut == 'agréer') {
            Alert::warning('Désolez ! ', 'déjà agréé');
        } else {
            $operateurmodule->update([
                'statut'             => 'agréer',
                'users_id'           =>  Auth::user()->id,
            ]);

            $operateurmodule->save();

            $moduleoperateurstatut = new Moduleoperateurstatut([
                'statut'                =>  "agréer",
                'validated_id'          =>  Auth::user()->id,
                'operateurmodules_id'   =>  $operateurmodule->id,

            ]);

            $moduleoperateurstatut->save();

            Alert::success('Effectué !', 'le module ' . $operateurmodule->module . ' a été agréé');
        }

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $this->validate($request, [
            "motif" => "required|string",
        ]);

        $operateurmodule   = Operateurmodule::findOrFail($id);

        if ($operateurmodule->statut == 'rejeter') {
            Alert::warning('Désolez', 'déjà rejeté');
        } else {
            $operateurmodule->update([
                'statut'             =>  'rejeter',
                'motif'              =>  $request->input('motif'),
                'users_id'           =>  Auth::user()->id,
            ]);

            $operateurmodule->save();

            $moduleoperateurstatut = new Moduleoperateurstatut([
                'statut'                =>  "rejeter",
                'motif'                 =>  $request->input('motif'),
                'validated_id'          =>  Auth::user()->id,
                'operateurmodules_id'   =>  $operateurmodule->id,

            ]);

            $moduleoperateurstatut->save();

            Alert::success('Effectué !', 'le module ' . $operateurmodule->module . ' a été rejeté');
        }

        return redirect()->back();
    }
}
