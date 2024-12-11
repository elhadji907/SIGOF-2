<?php

namespace App\Http\Controllers;

use App\Models\Demandeur;
use App\Models\Departement;
use App\Models\Module;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DemandeurController extends Controller
{
    public function index()
    {
        $demandeurs = demandeur::where('type', 'individuelle')
            ->get();
        return view("demandes.index", compact("demandeurs"));
    }
    public function show($id)
    {
        $departements = Departement::orderBy("created_at", "desc")->get();
        $modules = Module::orderBy("created_at", "desc")->get();
        $demandeur = Demandeur::findOrFail($id);
        $individuelle_total = $demandeur->individuelles()->count();
        $collective_total = $demandeur->collectives()->count();

        return view("demandes.show-" . $demandeur->type, compact("demandeur", "individuelle_total", "collective_total", "departements", "modules"));
    }
    public function showIndividuelle($id)
    {
        $departements = Departement::orderBy("created_at", "desc")->get();
        $modules = Module::orderBy("created_at", "desc")->get();
        $demandeur = Demandeur::findOrFail($id);
        $individuelle_total = $demandeur->individuelles()->where('type', 'individuelle')->count();
        $collective_total = $demandeur->collectives()->where('type', 'collective')->count();

        return view("demandes.show-individuelle", compact("demandeur", "individuelle_total", "collective_total", "departements", "modules"));
    }
    public function showCollective($id)
    {
        $departements = Departement::orderBy("created_at", "desc")->get();
        $modules = Module::orderBy("created_at", "desc")->get();
        $demandeur = Demandeur::findOrFail($id);
        $individuelle_total = $demandeur->individuelles()->where('type', 'individuelle')->count();
        $collective_total = $demandeur->collectives()->where('type', 'collective')->count();

        return view("demandes.show-collective", compact("demandeur", "individuelle_total", "collective_total", "departements", "modules"));
    }

    public function destroy($id)
    {
        Alert::warning('Attention !!! ', 'vous ne pouvez pas supprimer cette demande');

        return redirect()->back();
    }
}
