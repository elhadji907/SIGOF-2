<?php

namespace App\Http\Controllers;

use App\Models\Commissionagrement;
use App\Models\Historiqueagrement;
use App\Models\Operateur;
use App\Models\Operateurmodule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CommissionagrementController extends Controller
{
    public function index()
    {
        $commissionagrements = Commissionagrement::get();
        return view('operateurs.commissionagrements.index', compact('commissionagrements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'commission'    =>  'required|string|unique:commissionagrements,commission,except,id',
            'session'       =>  'required|string',
            'date'          =>  'nullable|date',
            'lieu'          =>  'nullable|string',
            'annee'         =>  'required|string',

        ]);

        $commissionagrement = new Commissionagrement([

            'commission'    =>  $request->input('commission'),
            'session'       =>  $request->input('session'),
            'date'          =>  $request->input('date'),
            'description'   =>  $request->input('description'),
            'lieu'          =>  $request->input('lieu'),
            'annee'         =>  $request->input('annee'),

        ]);

        $commissionagrement->save();
        Alert::success('Effectuée !', 'Commission ajoutée avec succès');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $commissionagrement = Commissionagrement::findOrFail($id);

        $request->validate([
            'commission'    =>  ["required", "string", "unique:commissionagrements,commission,{$id}"],
            'session'       =>  'required|string',
            'date'          =>  'nullable|date',
            'lieu'          =>  'nullable|string',
            'annee'         =>  'required|string',

        ]);

        $commissionagrement->update([
            'commission'    =>  $request->input('commission'),
            'session'       =>  $request->input('session'),
            'date'          =>  $request->input('date'),
            'description'   =>  $request->input('description'),
            'lieu'          =>  $request->input('lieu'),
            'annee'         =>  $request->input('annee'),

        ]);

        $commissionagrement->save();

        Alert::success('Effectuée !', 'Commission modifiée avec succès');

        return redirect()->back();
    }

    public function show($id)
    {
        $commissionagrement = Commissionagrement::findOrFail($id);

        $operateurs = Operateur::where('commissionagrements_id', $commissionagrement->id)
            ->where('statut_agrement', '!=', 'non retenu')
            ->get();

        $operateurs_agreer_count = Operateur::where('commissionagrements_id', $commissionagrement->id)
            ->where('statut_agrement', 'agréer')
            ->count();

        $operateurs_reserve_count = Operateur::where('commissionagrements_id', $commissionagrement->id)
            ->where('statut_agrement', 'sous réserve')
            ->count();

        $operateurs_rejeter_count = Operateur::where('commissionagrements_id', $commissionagrement->id)
            ->where('statut_agrement', 'rejeter')
            ->count();

        /*  $operateurAgrement = DB::table('operateurs')
            ->where('commissionagrements_id', $commissionagrement->id)
            ->pluck('id', 'id')
            ->all();

        $operateurAgrementCheck = DB::table('operateurs')
            ->where('commissionagrements_id', '!=', null)
            ->where('commissionagrements_id', '!=', $id)
            ->pluck('id', 'id')
            ->all(); */

        return view('operateurs.commissionagrements.show', compact('commissionagrement', 'operateurs', 'operateurs_agreer_count', 'operateurs_reserve_count', 'operateurs_rejeter_count'));
    }

    public function destroy($id)
    {
        $commissionagrement = Commissionagrement::findOrFail($id);
        $commissionagrement->delete();
        Alert::success('Effectuée !', 'Commission supprimée avec succès');
        return redirect()->back();
    }

    public function givecommisionagrement(Request $request, $idcommissionagrement)
    {
        $request->validate([
            'operateurs' => ['required']
        ]);

        $operateur_deja_retenus = Operateur::where('commissionagrements_id', $idcommissionagrement)->get();

        /*   foreach ($operateur_deja_retenus as $key => $value) {

            $value->update([
                "commissionagrements_id"        =>  null,
            ]);

            $value->save();
        } */

        foreach ($request->operateurs as $operateur) {
            $operateur = Operateur::findOrFail($operateur);

            $operateur->update([
                "commissionagrements_id" =>  $idcommissionagrement,
                "statut_agrement"        =>  'attente',
            ]);

            $operateur->save();

            $historiqueagrement = new Historiqueagrement([
                'operateurs_id'              =>   $operateur->id,
                'commissionagrements_id'     =>   $idcommissionagrement,
                'statut'                     =>   'attente',
                'validated_id'               =>   Auth::user()->id,

            ]);

            $historiqueagrement->save();
        }

        Alert::success('Félicitations !', 'opérateur(s) ajouté(s) avec succès');

        return redirect()->back();
    }

    public function addopCommission($id)
    {
        $commissionagrement = Commissionagrement::findOrFail($id);

        $operateurs = Operateur::where('statut_agrement', 'retenu')
            ->orwhere('statut_agrement', 'attente')
            ->orwhere('statut_agrement', 'retirer')
            ->get();

        $operateurAgrement = DB::table('operateurs')
            ->where('commissionagrements_id', $commissionagrement->id)
            ->pluck('id', 'id')
            ->all();

        $operateurAgrementCheck = DB::table('operateurs')
            ->where('commissionagrements_id', '!=', null)
            ->where('commissionagrements_id', '!=', $id)
            ->pluck('id', 'id')
            ->all();

        return view('operateurs.commissionagrements.add_op_commsions', compact('commissionagrement', 'operateurs', 'operateurAgrement', 'operateurAgrementCheck'));
    }

    public function showAgreer($id)
    {
        $commissionagrement = Commissionagrement::findOrFail($id);

        $operateurs = Operateur::where('commissionagrements_id', $commissionagrement->id)
            ->where('statut_agrement', 'agréer')
            ->get();

        $operateurmodules = Operateurmodule::join('operateurs', 'operateurs.id', 'operateurmodules.operateurs_id')
            ->select('operateurmodules.*')
            ->where('operateurs.statut_agrement', "agréer")
            ->where('operateurs.commissionagrements_id', $commissionagrement->id)
            ->where('operateurmodules.statut', "agréer")
            ->get();

        $count_operateurmodules_distinct = Operateurmodule::join('operateurs', 'operateurs.id', 'operateurmodules.operateurs_id')
            ->select('operateurmodules.*')
            ->where('operateurs.statut_agrement', "agréer")
            ->where('operateurs.commissionagrements_id', $commissionagrement->id)
            ->where('operateurmodules.statut', "agréer")
            ->distinct('module')
            ->count('module');

        return view('operateurs.agrements.show_agreer', compact('operateurs', 'commissionagrement', 'operateurmodules', 'count_operateurmodules_distinct'));
    }

    public function showReserve($id)
    {
        $commissionagrement = Commissionagrement::findOrFail($id);

        $operateurs = Operateur::where('commissionagrements_id', $commissionagrement->id)
            ->where('statut_agrement', 'sous réserve')
            ->get();

        $operateurmodules = Operateurmodule::join('operateurs', 'operateurs.id', 'operateurmodules.operateurs_id')
            ->select('operateurmodules.*')
            ->where('operateurs.statut_agrement', "sous réserve")
            ->where('operateurs.commissionagrements_id', $commissionagrement->id)
            ->where('operateurmodules.statut', "sous réserve")
            ->get();

        return view('operateurs.agrements.show_reserve', compact('operateurs', 'commissionagrement', 'operateurmodules'));
    }

    public function showRejeter($id)
    {
        $commissionagrement = Commissionagrement::findOrFail($id);

        $operateurs = Operateur::where('commissionagrements_id', $commissionagrement->id)
            ->where('statut_agrement', 'rejeter')
            ->get();

        return view('operateurs.agrements.show_rejeter', compact('operateurs', 'commissionagrement'));
    }
}
