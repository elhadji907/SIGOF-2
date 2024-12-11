<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Individuelle;
use App\Models\Module;
use App\Models\Projet;
use App\Models\Projetlocalite;
use App\Models\Projetmodule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;

class ProjetController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|Demandeur|DIOF|ADIOF']);
        $this->middleware("permission:projet-view", ["only" => ["index"]]);
        $this->middleware("permission:projet-create", ["only" => ["create", "store"]]);
        $this->middleware("permission:projet-update", ["only" => ["update", "edit"]]);
        $this->middleware("permission:projet-show", ["only" => ["show"]]);
        $this->middleware("permission:projet-delete", ["only" => ["destroy"]]);
    }
    public function index()
    {
        $projets = Projet::get();
        return view('projets.index', compact('projets'));
    }
    public function addProjet(Request $request)
    {
        $this->validate($request, [
            "name"              => ["required", "string", Rule::unique('projets')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
            "sigle"             => ["required", "string", Rule::unique('projets')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
            "date_signature"    => ["date", "string", Rule::unique('projets')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
            "description"       => ["required", "string", Rule::unique('projets')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
            "duree"             => ["nullable", "string"],
            "budjet"            => ["nullable", "string"],
            "effectif"          => ["nullable", "string"],
            "debut"             => ["nullable", "date"],
            "fin"               => ["nullable", "date"],
            "type"              => ["required", "string"],
            "type_projet"       => ["required", "string"],
        ]);

        $projet = new Projet([
            'name'               =>  $request->input('name'),
            'sigle'              =>  $request->input('sigle'),
            'date_signature'     =>  $request->input('date_signature'),
            'description'        =>  $request->input('description'),
            'duree'              =>  $request->input('duree'),
            'budjet'             =>  $request->input('budjet'),
            'fin'                =>  $request->input('fin'),
            'debut'              =>  $request->input('debut'),
            'effectif'           =>  $request->input('effectif'),
            'type_localite'      =>  $request->input('type'),
            'type_projet'        =>  $request->input('type_projet'),
            'statut'             =>  'attente',

        ]);

        $projet->save();

        Alert::success('Félicitations !', 'ajouté avec succès');

        return redirect()->back();
    }

    public function show($id)
    {
        $projet = Projet::findOrFail($id);
        $projetlocalites = Projetlocalite::where('projets_id', $id)->get();
        return view(
            'projets.show',
            compact(
                'projet',
                'projetlocalites'
            )
        );
    }

    public function edit(Request $request, $id)
    {
        $projet = Projet::findOrFail($id);

        return view('projets.update', compact('projet'));
    }

    public function update(Request $request, $id)
    {
        $projet = Projet::find($id);

        $this->validate($request, [
            "name"              => ["required", "string", Rule::unique('projets')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })->ignore($id)],
            "sigle"             => ["required", "string", Rule::unique('projets')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })->ignore($id)],
            "date_signature"    => ["date", "string"],
            "description"       => ["required", "string", Rule::unique('projets')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })->ignore($id)],
            "duree"             => ["nullable", "string"],
            "budjet"            => ["nullable", "string"],
            "effectif"          => ["nullable", "string"],
            "debut"             => ["nullable", "date"],
            "fin"               => ["nullable", "date"],
            "type"              => ["required", "string"],
            "type_projet"       => ["required", "string"],
            "date_ouverture"    => ["required", "string"],
            "date_fermeture"    => ["required", "string"],
            'image'             => ['image', 'nullable', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'convention_file'   => ['file', 'nullable', 'mimes:pdf', 'max:2048'],
        ]);

        if (request('image')) {

            $imagePath = request('image')->store('projets', 'public');

            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(2400, 2400);

            $image->save();
        } else {
            $imagePath = $projet->image;
        }
        if (request('convention_file')) {

            $filePath = request('convention_file')->store('projets', 'public');

            $file = $request->file('convention_file');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Remove unwanted characters
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);

        } else {
            $filePath = $projet->convention_file;
        }

        $projet->update([
            'name'                  =>  $request->input('name'),
            'sigle'                 =>  $request->input('sigle'),
            'date_signature'        =>  $request->input('date_signature'),
            'description'           =>  $request->input('description'),
            'duree'                 =>  $request->input('duree'),
            'budjet'                =>  $request->input('budjet'),
            'fin'                   =>  $request->input('fin'),
            'debut'                 =>  $request->input('debut'),
            'effectif'              =>  $request->input('effectif'),
            'type_localite'         =>  $request->input('type'),
            'type_projet'           =>  $request->input('type_projet'),
            'date_ouverture'        =>  $request->input('date_ouverture'),
            'date_fermeture'        =>  $request->input('date_fermeture'),
            'image'                 =>  $imagePath,
            'convention_file'       =>  $filePath
        ]);

        $projet->save();

        Alert::success('Modification effectuée', 'avec succès');

        return redirect()->back();
    }
    public function destroy($id)
    {
        $projet = Projet::findOrFail($id);

        $projet->delete();

        Alert::success('Fait !', 'supprimer avec succès');

        return redirect()->back();
    }

    public function projetsIndividuelle($id)
    {
        $user = Auth::user();
        $projet = Projet::findOrFail($id);
        $type_localite = $projet->type_localite;
        $projetlocalites = Projetlocalite::where('projets_id', $id)
            ->orderBy("created_at", "desc")->get();

        $projetmodules = Projetmodule::where('projets_id', $id)
            ->orderBy("created_at", "desc")
            ->get();

        $individuelle = Individuelle::where('users_id', $user->id)
            ->where('projets_id', $id)
            ->where('numero', '!=', null)
            ->get();

        $statut_projet = $projet->statut;

        if ($statut_projet == 'ouvert') {
            $statut =  $statut_projet;
        } else {
            $statut = null;
        }

        $individuelle_total = $individuelle->count();

        $individuelles = Individuelle::where('users_id', $user->id)
            ->where('projets_id', $id)
            ->get();

        if ($individuelle_total == 0) {
            return view(
                "individuelles.show-projet-aucune",
                compact(
                    "individuelle_total",
                    "projetlocalites",
                    "projetmodules",
                    "individuelles",
                    "statut",
                    "projet"
                )
            );
        } else {
            return view(
                "individuelles.show-projet",
                compact(
                    "individuelle_total",
                    "projetlocalites",
                    "projetmodules",
                    "individuelles",
                    "statut",
                    "projet"
                )
            );
        }
    }

    public function ouvrirProjet($id)
    {
        $projet = Projet::findOrFail($id);

        $projet->update([
            'statut' => 'ouvert',
        ]);

        $projet->save();

        Alert::success('Féliciatations !', $projet->sigle . ' est ouvert');

        return redirect()->back();
    }

    public function fermerProjet($id)
    {

        $projet = Projet::findOrFail($id);

        $projet->update([
            'statut' => 'fermer',
        ]);

        $projet->save();

        Alert::success('Merci !', $projet->sigle . ' est fermé');

        return redirect()->back();
    }

    public function showprojetProgramme(Request $request)
    {
        $user = Auth::user();

        /*  $projets = Projet::join('individuelles', 'projets.id', 'individuelles.projets_id')
            ->select('projets.*')
            ->where('individuelles.users_id',  $user->id)
            ->where('individuelles.projets_id', '!=', null)
            ->where('projets.statut', 'ouvert')
            ->orwhere('projets.statut', 'fermer')
            ->distinct()
            ->get(); */

        $projets = Individuelle::join('projets', 'projets.id', 'individuelles.projets_id')
            ->select('projets.*')
            ->where('individuelles.users_id',  $user->id)
            ->where('individuelles.projets_id', '!=', null)
            ->where('projets.statut', 'ouvert')
            ->orwhere('projets.statut', 'fermer')
            ->distinct()
            ->get();

        return view(
            "individuelles.show-projetprogramme",
            compact(
                "projets"
            )
        );
    }
    public function projetsBeneficiaire(Request $request, $id)
    {
        $projet = Projet::findOrFail($id);

        $type_localite = $projet->type_localite;

        if ($type_localite == 'Region') {
            $region = 'Région';
            $departement = null;
            $arrondissement = null;
            $commune = null;
        } elseif ($type_localite == 'Departement') {
            $departement = 'Département';
            $arrondissement = null;
            $commune = null;
            $region = null;
        } elseif ($type_localite == 'Arrondissement') {
            $arrondissement = 'Arrondissement';
            $commune = null;
            $departement = null;
            $region = null;
        } elseif ($type_localite == 'Commune') {
            $commune = 'Commune';
            $departement = null;
            $region = null;
            $arrondissement = null;
        } else {
            $commune = null;
            $departement = null;
            $region = null;
            $arrondissement = null;
        }


        return view('projets.individuelle', compact('projet', 'commune', 'arrondissement', 'departement', 'region'));
    }
}
