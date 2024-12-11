<?php

namespace App\Http\Controllers;

use App\Models\Operateur;
use App\Models\Validationoperateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ValidationoperateurController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|DEC|ADEC']);
        /* $this->middleware(['permission:arrive-show']); */
        // or with specific guard
        /* $this->middleware(['role_or_permission:super-admin']); */
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "motif" => "required|string",
        ]);

        $operateur   = Operateur::findOrFail($id);

        $operateur->update([
            'statut_agrement'    =>  'sous réserve',
            'motif'              =>  $request->input('motif'),
        ]);

        $operateur->save();

        $validationoperateur = new Validationoperateur([
            'action'          =>  "agréer sous réserve",
            'motif'           =>  $request->input('motif'),
            'validated_id'    =>  Auth::user()->id,
            'session'         =>  $operateur?->session_agrement,
            'operateurs_id'   =>  $operateur->id,

        ]);

        $validationoperateur->save();

        Alert::success('Effectué !', $operateur->sigle . ' agréé sous réserve');

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $this->validate($request, [
            "motif" => "required|string",
        ]);

        $operateur   = Operateur::findOrFail($id);

        $operateur->update([
            'statut_agrement'    =>  'rejeter',
            'motif'              =>  $request->input('motif'),
        ]);

        $operateur->save();

        $validationoperateur = new Validationoperateur([
            'action'                =>  "rejeter",
            'motif'                 =>  $request->input('motif'),
            'validated_id'          =>  Auth::user()->id,
            'session'               =>  $operateur?->session_agrement,
            'operateurs_id'         =>  $operateur->id,

        ]);

        $validationoperateur->save();

        Alert::success('Effectué !', $operateur->sigle . ' a été rejeté');


        return redirect()->back();
    }
}
