<?php

namespace App\Http\Controllers;

use App\Models\Collective;
use App\Models\Validationcollective;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ValidationcollectiveController extends Controller
{
    public function update($id)
    {
        $collective   = Collective::findOrFail($id);
        if ($collective->statut_demande == 'attente') {
            Alert::warning('Désolez !', 'demande déjà validée');
        } elseif ($collective->statut_demande == 'retenue') {
            Alert::warning('Désolez !', 'demande déjà retenue');
        } else {
            $collective->update([
                'statut_demande'             => 'attente',
                'validated_by'       =>  Auth::user()->firstname . ' ' . Auth::user()->name,
            ]);

            $collective->save();

            $validated_by = new Validationcollective([
                'validated_id'       =>       Auth::user()->id,
                'action'             =>      'attente',
                'collectives_id'   =>      $collective->id
            ]);

            $validated_by->save();

            Alert::success('Félicitation !', 'demande acceptée');
        }

        /* return redirect()->back()->with("status", "Demande validée"); */
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $this->validate($request, [
            "motif" => "required|string",
        ]);

        $collective   = Collective::findOrFail($id);

        if ($collective->statut_demande == 'rejeter') {
            Alert::warning('Désolez !', 'demande déjà rejetée');
        }  elseif ($collective->statut_demande == 'retenue') {
            Alert::warning('Désolez !', 'demande déjà retenue');
        } else {
            $collective->update([
                'statut_demande'                => 'rejeter',
                'canceled_by'           =>  Auth::user()->firstname . ' ' . Auth::user()->name,
            ]);

            $collective->save();

            $validated_by = new Validationcollective([
                'validated_id'       =>      Auth::user()->id,
                'action'             =>      'rejeter',
                'motif'              =>      $request->input('motif'),
                'collectives_id'   =>      $collective->id
            ]);

            $validated_by->save();

            Alert::success('Fait ! ', 'demande rejetée');
        }

        return redirect()->back();
    }
}
