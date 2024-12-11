<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Validationformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ValidationformationController extends Controller
{
    public function update($id)
    {
        $formation   = Formation::findOrFail($id);

        $count = $formation->individuelles->count();
        
        if ($count == '0' || empty($formation->operateur)) {
            Alert::warning('Désolez !', 'action non autorisée');
        } else {
            if ($formation->statut == 'terminer') {
                Alert::warning('Désolez !', 'formation déjà exécutée');
            } elseif ($formation->statut == 'démarrer') {
                Alert::warning('Désolez !', 'formation en cours...');
            } else {
                $formation->update([
                    'statut'             => 'démarrer',
                    'validated_by'       =>  Auth::user()->firstname . ' ' . Auth::user()->name,
                ]);

                $formation->save();

                $validated_by = new Validationformation([
                    'validated_id'       =>       Auth::user()->id,
                    'action'             =>      'démarrer',
                    'formations_id'      =>      $formation->id
                ]);

                $validated_by->save();

                Alert::success('Félicitation !', 'la formation est lancée');
            }
        }

        /* return redirect()->back()->with("status", "Demande validée"); */
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $this->validate($request, [
            "motif" => "required|string",
        ]);

        $formation   = Formation::findOrFail($id);

        if ($formation->statut == 'annuler') {
            Alert::warning('Désolez !', 'formation déjà annulée');
        } elseif ($formation->statut == 'terminer') {
            Alert::warning('Désolez !', 'formation déjà exécutée');
        } else {
            $formation->update([
                'statut'                => 'annuler',
                'canceled_by'           =>  Auth::user()->firstname . ' ' . Auth::user()->name,
            ]);

            $formation->save();

            $validated_by = new Validationformation([
                'validated_id'       =>      Auth::user()->id,
                'action'             =>      'annuler',
                'motif'              =>      $request->input('motif'),
                'formations_id'   =>      $formation->id
            ]);

            $validated_by->save();

            Alert::success('Fait ! ', 'formation annulée');
        }

        return redirect()->back();
    }
}
