<?php

namespace App\Http\Controllers;

use App\Models\Individuelle;
use App\Models\Validationindividuelle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ValidationIndividuelleController extends Controller
{
    public function update($id)
    {
        $individuelle   = Individuelle::findOrFail($id);
        if ($individuelle->statut == 'attente') {
            Alert::warning('Désolez !', 'demande déjà validée');
        } elseif ($individuelle->statut == 'programmer') {
            Alert::warning('Désolez !', 'demande déjà programmée');
        } elseif ($individuelle->statut == 'retenue') {
            Alert::warning('Désolez !', 'demande déjà traitée');
        } elseif ($individuelle->statut == 'terminer') {
            Alert::warning('Désolez !', 'demandeur déjà formé');
        } elseif ($individuelle->statut == 'rejeter') {
            Alert::warning('Désolez !', 'demandeur déjà rejetée');
        } else {
            $individuelle->update([
                'statut'             => 'attente',
                'validated_by'       =>  Auth::user()->firstname . ' ' . Auth::user()->name,
            ]);

            $individuelle->save();

            $validated_by = new Validationindividuelle([
                'validated_id'       =>       Auth::user()->id,
                'action'             =>      'attente',
                'individuelles_id'   =>      $individuelle->id
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

        $individuelle   = Individuelle::findOrFail($id);

        if ($individuelle->statut == 'rejeter') {
            Alert::warning('Désolez !', 'demande déjà rejetée');
        } elseif ($individuelle->statut == 'programmer') {
            Alert::warning('Désolez !', 'demande déjà programmée');
        } elseif ($individuelle->statut == 'attente') {
            Alert::warning('Désolez !', 'demande déjà traitée');
        } elseif ($individuelle->statut == 'retenue') {
            Alert::warning('Désolez !', 'demande déjà traitée');
        } elseif ($individuelle->statut == 'terminer') {
            Alert::warning('Désolez !', 'demandeur déjà formé');
        } else {
            $individuelle->update([
                'statut'                => 'rejeter',
                'canceled_by'           =>  Auth::user()->firstname . ' ' . Auth::user()->name,
            ]);

            $individuelle->save();

            $validated_by = new Validationindividuelle([
                'validated_id'       =>      Auth::user()->id,
                'action'             =>      'rejeter',
                'motif'              =>      $request->input('motif'),
                'individuelles_id'   =>      $individuelle->id
            ]);

            $validated_by->save();

            Alert::success('Fait ! ', 'demande rejetée');
        }

        return redirect()->back();
    }
}
