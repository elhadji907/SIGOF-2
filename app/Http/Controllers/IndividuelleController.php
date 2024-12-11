<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndividuelleStoreRequest;
use App\Models\Arrondissement;
use App\Models\Commune;
use App\Models\Demandeur;
use App\Models\Departement;
use App\Models\Individuelle;
use App\Models\Module;
use App\Models\Projet;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use RealRashid\SweetAlert\Facades\Alert;

class IndividuelleController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|Demandeur|DIOF|ADIOF']);
        /* $this->middleware("permission:user-view", ["only" => ["index"]]); */
        $this->middleware("permission:individuelle-view", ["only" => ["index"]]);
        /* $this->middleware(['permission:arrive-show']); */
        // or with specific guard
        /* $this->middleware(['role_or_permission:super-admin']); */
    }
    public function index()
    {
        /* $individuelles = Individuelle::skip(0)->take(1000)->get(); */
        //skip permet de sauter des lignes, par exemple skip(2) permet de parcourrir la BD en sautant ligne par 2
        //take joue le même role que limit
        $total_count = Individuelle::get();
        $total_count = number_format($total_count->count(), 0, ',', ' ');

        $individuelles = Individuelle::limit(500)
            ->latest()
            ->get();

        $count_demandeur = number_format($individuelles?->count(), 0, ',', ' ');

        if ($count_demandeur < "1") {
            $title = 'Aucune demande individuelle';
        } elseif ($count_demandeur == "1") {
            $title = $count_demandeur . ' demande individuelle sur un total de ' . $total_count;
        } else {
            $title = 'Liste des ' . $count_demandeur . ' dernières demandes individuelles sur un total de ' . $total_count;
        }

        $departements = Departement::orderBy("created_at", "DESC")->get();
        $modules = Module::orderBy("created_at", "desc")->get();

        /* $today = date('Y-m-d');
        $annee = date('Y');
        $annee_lettre = 'Diagramme à barres, année: ' . date('Y');
        $count_today = Individuelle::where("created_at", "LIKE",  "{$today}%")->count();

        $janvier = DB::table('individuelles')->whereMonth("created_at", "01")->where("created_at", "LIKE", "{$annee}%")->where('deleted_at', null)->count();
        $fevrier = DB::table('individuelles')->whereMonth("created_at", "02")->where("created_at", "LIKE", "{$annee}%")->where('deleted_at', null)->count();
        $mars = DB::table('individuelles')->whereMonth("created_at", "03")->where("created_at", "LIKE", "{$annee}%")->where('deleted_at', null)->count();
        $avril = DB::table('individuelles')->whereMonth("created_at", "04")->where("created_at", "LIKE", "{$annee}%")->where('deleted_at', null)->count();
        $mai = DB::table('individuelles')->whereMonth("created_at", "05")->where("created_at", "LIKE", "{$annee}%")->where('deleted_at', null)->count();
        $juin = DB::table('individuelles')->whereMonth("created_at", "06")->where("created_at", "LIKE", "{$annee}%")->where('deleted_at', null)->count();
        $juillet = DB::table('individuelles')->whereMonth("created_at", "07")->where("created_at", "LIKE", "{$annee}%")->where('deleted_at', null)->count();
        $aout = DB::table('individuelles')->whereMonth("created_at", "08")->where("created_at", "LIKE", "{$annee}%")->where('deleted_at', null)->count();
        $septembre = DB::table('individuelles')->whereMonth("created_at", "09")->where("created_at", "LIKE", "{$annee}%")->where('deleted_at', null)->count();
        $octobre = DB::table('individuelles')->whereMonth("created_at", "10")->where("created_at", "LIKE", "{$annee}%")->where('deleted_at', null)->count();
        $novembre = DB::table('individuelles')->whereMonth("created_at", "11")->where("created_at", "LIKE", "{$annee}%")->where('deleted_at', null)->count();
        $decembre = DB::table('individuelles')->whereMonth("created_at", "12")->where("created_at", "LIKE", "{$annee}%")->where('deleted_at', null)->count();

        $masculin = Individuelle::join('users', 'users.id', 'individuelles.users_id')
            ->select('individuelles.*')
            ->where('users.civilite', "M.")
            ->count();

        $feminin = Individuelle::join('users', 'users.id', 'individuelles.users_id')
            ->select('individuelles.*')
            ->where('users.civilite', "Mme")
            ->count();

        $attente = Individuelle::where('statut', 'attente')
            ->count();

        $nouvelle = Individuelle::where('statut', 'nouvelle')
            ->count();

        $retenue = Individuelle::where('statut', 'retenue')
            ->count();

        $terminer = Individuelle::where('statut', 'terminer')
            ->count();

        $rejeter = Individuelle::where('statut', 'rejeter')
            ->count();

        $pourcentage_hommes = ($masculin / $individuelles->count()) * 100;
        $pourcentage_femmes = ($feminin / $individuelles->count()) * 100; 

        return view("individuelles.index", compact("pourcentage_femmes", "pourcentage_hommes", "rejeter", "terminer", "retenue", "nouvelle", "attente", "individuelles", "modules", "departements", "count_today", 'janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre', 'annee', 'annee_lettre', 'masculin', 'feminin'));*/
        return view(
            "individuelles.index",
            compact('individuelles', 'departements', 'modules', 'title')
        );
    }

    public function create()
    {
        //
    }

    /* public function store(IndividuelleStoreRequest $request): RedirectResponse */
    public function store(Request $request)
    {
        $this->validate($request, [
            'telephone_secondaire'          => ['required', 'string', 'max:9', 'min:9'],
            'adresse'                       => ['required', 'string', 'max:255'],
            'departement'                   => ['required', 'string', 'max:255'],
            'module'                        => ['required', 'string', 'max:255'],
            'niveau_etude'                  => ['required', 'string', 'max:255'],
            'diplome_academique'            => ['required', 'string', 'max:255'],
            'diplome_professionnel'         => ['required', 'string', 'max:255'],
            'projet_poste_formation'        => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();

        $individuelle_total     = Individuelle::where('users_id', $user->id)
            ->where('projets_id', null)
            ->count();

        if ($individuelle_total >= 3) {
            Alert::warning('Attention ! ', 'Vous avez atteint le nombre de demandes autoriées');
            return redirect()->back();
        } else {

            $date_depot =   date('Y-m-d');


            $anneeEnCours = date('Y');
            $an = date('y');

            $numero_individuelle = Individuelle::join('users', 'users.id', 'individuelles.users_id')
                ->select('individuelles.*')
                ->where('date_depot',  "LIKE",  "{$anneeEnCours}%")
                ->get()->last();

            if (isset($numero_individuelle)) {
                $numero_individuelle = Individuelle::join('users', 'users.id', 'individuelles.users_id')
                    ->select('individuelles.*')
                    ->get()->last()->numero;
                $numero_individuelle = ++$numero_individuelle;
            } else {
                $numero_individuelle = $an . "0001";
                $numero_individuelle = 'I' . $numero_individuelle;
            }

            $longueur = strlen($numero_individuelle);

            if ($longueur <= 1) {
                $numero_individuelle   =   strtolower("00000" . $numero_individuelle);
            } elseif ($longueur >= 2 && $longueur < 3) {
                $numero_individuelle   =   strtolower("0000" . $numero_individuelle);
            } elseif ($longueur >= 3 && $longueur < 4) {
                $numero_individuelle   =   strtolower("000" . $numero_individuelle);
            } elseif ($longueur >= 4 && $longueur < 5) {
                $numero_individuelle   =   strtolower("00" . $numero_individuelle);
            } elseif ($longueur >= 5 && $longueur < 6) {
                $numero_individuelle   =   strtolower("0" . $numero_individuelle);
            } else {
                $numero_individuelle   =   strtolower($numero_individuelle);
            }


            $numero_individuelle = strtoupper($numero_individuelle);

            $departement = Departement::where('nom', $request->input("departement"))->first();

            $regionid = $departement->region->id;

            $module_find    = DB::table('modules')->where('name', $request->input("module"))->first();

            $demandeur_ind = Individuelle::where('users_id', $user->id)->get();

            if (isset($module_find)) {
                foreach ($demandeur_ind as $key => $value) {
                    if ($value->module->name == $module_find->name) {
                        Alert::warning('Attention !', ' le module ' . $value->module->name . ' a déjà été choisi');
                        return redirect()->back();
                    }
                }
                $individuelle = new Individuelle([
                    'date_depot'                        =>  $date_depot,
                    'numero'                            =>  $numero_individuelle,
                    'adresse'                           =>  $request->input('adresse'),
                    'telephone'                         =>  $request->input('telephone_secondaire'),
                    'niveau_etude'                      =>  $request->input('niveau_etude'),
                    'diplome_academique'                =>  $request->input('diplome_academique'),
                    'autre_diplome_academique'          =>  $request->input('autre_diplome_academique'),
                    'option_diplome_academique'         =>  $request->input('option_diplome_academique'),
                    'etablissement_academique'          =>  $request->input('etablissement_academique'),
                    'diplome_professionnel'             =>  $request->input('diplome_professionnel'),
                    'autre_diplome_professionnel'       =>  $request->input('autre_diplome_professionnel'),
                    'specialite_diplome_professionnel'  =>  $request->input('specialite_diplome_professionnel'),
                    'etablissement_professionnel'       =>  $request->input('etablissement_professionnel'),
                    'projet_poste_formation'            =>  $request->input('projet_poste_formation'),
                    'projetprofessionnel'               =>  $request->input('projetprofessionnel'),
                    'qualification'                     =>  $request->input('qualification'),
                    'experience'                        =>  $request->input('experience'),
                    "departements_id"                   =>  $departement->id,
                    "regions_id"                        =>  $regionid,
                    "modules_id"                        =>  $module_find->id,
                    /* 'autre_module'                      =>  $request->input('autre_module'), */
                    'statut'                            => 'nouvelle',
                    'users_id'                          =>  $user->id,
                ]);
            } else {
                $module = new Module([
                    'name'            => $request->input('module'),
                ]);

                $module->save();

                $individuelle = new Individuelle([
                    'date_depot'                        =>  $date_depot,
                    'numero'                            =>  $numero_individuelle,
                    'adresse'                           =>  $request->input('adresse'),
                    'telephone'                         =>  $request->input('telephone_secondaire'),
                    'niveau_etude'                      =>  $request->input('niveau_etude'),
                    'diplome_academique'                =>  $request->input('diplome_academique'),
                    'autre_diplome_academique'          =>  $request->input('autre_diplome_academique'),
                    'option_diplome_academique'         =>  $request->input('option_diplome_academique'),
                    'etablissement_academique'          =>  $request->input('etablissement_academique'),
                    'diplome_professionnel'             =>  $request->input('diplome_professionnel'),
                    'autre_diplome_professionnel'       =>  $request->input('autre_diplome_professionnel'),
                    'specialite_diplome_professionnel'  =>  $request->input('specialite_diplome_professionnel'),
                    'etablissement_professionnel'       =>  $request->input('etablissement_professionnel'),
                    'projet_poste_formation'            =>  $request->input('projet_poste_formation'),
                    'projetprofessionnel'               =>  $request->input('projetprofessionnel'),
                    'qualification'                     =>  $request->input('qualification'),
                    'experience'                        =>  $request->input('experience'),
                    "departements_id"                   =>  $departement->id,
                    "regions_id"                        =>  $regionid,
                    "modules_id"                        =>  $module->id,
                    /* 'autre_module'                      =>  $request->input('autre_module'), */
                    'statut'                            => 'nouvelle',
                    'users_id'                          =>  $user->id,
                ]);
            }
        }

        $individuelle->save();

        Alert::success('Enregistrée ! ', 'demande ajoutée avec succès');

        return Redirect::back();
    }
    public function individuellesStore(Request $request)
    {
        $this->validate($request, [
            'telephone_secondaire'          => ['required', 'string', 'max:9', 'min:9'],
            'adresse'                       => ['required', 'string', 'max:255'],
            'departement'                   => ['required', 'string', 'max:255'],
            'module'                        => ['required', 'string', 'max:255'],
            'niveau_etude'                  => ['required', 'string', 'max:255'],
            'diplome_academique'            => ['required', 'string', 'max:255'],
            'diplome_professionnel'         => ['required', 'string', 'max:255'],
            'projet_poste_formation'        => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();
        $projet = Projet::findOrFail($request?->idprojet);

        $individuelle           = Individuelle::where('users_id', $user->id)
            ->where('projets_id', $request?->idprojet)
            ->count();

        if ($projet->statut == 'fermer') {
            Alert::warning('Attention ! ', 'les dépôts sont clôturés');
            return redirect()->back();
        } elseif ($individuelle >= 3) {
            Alert::warning('Attention ! ', 'Vous avez atteint le nombre de demandes autoriées');
            return redirect()->back();
        } else {

            $date_depot =   date('Y-m-d');


            $anneeEnCours = date('Y');
            $an = date('y');

            $numero_individuelle = Individuelle::join('users', 'users.id', 'individuelles.users_id')
                ->select('individuelles.*')
                ->where('date_depot',  "LIKE",  "{$anneeEnCours}%")
                ->get()->last();

            if (isset($numero_individuelle)) {
                $numero_individuelle = Individuelle::join('users', 'users.id', 'individuelles.users_id')
                    ->select('individuelles.*')
                    ->get()->last()->numero;
                $numero_individuelle = ++$numero_individuelle;
            } else {
                $numero_individuelle = $an . "0001";
                $numero_individuelle = 'I' . $numero_individuelle;
            }

            $longueur = strlen($numero_individuelle);

            if ($longueur <= 1) {
                $numero_individuelle   =   strtolower("00000" . $numero_individuelle);
            } elseif ($longueur >= 2 && $longueur < 3) {
                $numero_individuelle   =   strtolower("0000" . $numero_individuelle);
            } elseif ($longueur >= 3 && $longueur < 4) {
                $numero_individuelle   =   strtolower("000" . $numero_individuelle);
            } elseif ($longueur >= 4 && $longueur < 5) {
                $numero_individuelle   =   strtolower("00" . $numero_individuelle);
            } elseif ($longueur >= 5 && $longueur < 6) {
                $numero_individuelle   =   strtolower("0" . $numero_individuelle);
            } else {
                $numero_individuelle   =   strtolower($numero_individuelle);
            }


            $numero_individuelle = strtoupper($numero_individuelle);

            if (!empty($request->input("departement")) && $projet?->type_localite == 'Commune') {
                $commune = Commune::where('nom', $request->input("departement"))->first();
                $communeid = $commune?->id;
                $arrondissement = $commune?->arrondissement;
                $arrondissementid = $commune?->arrondissement?->id;
                $departement = $commune?->arrondissement?->departement;
                $departementid = $commune?->arrondissement?->departement?->id;
                $regionid = $commune?->arrondissement?->departement?->region?->id;
            } elseif (!empty($request->input("departement")) && $projet?->type_localite == 'Arrondissement') {
                $communeid = null;
                $arrondissement = Arrondissement::where('nom', $request->input("departement"))->first();
                $arrondissementid = $arrondissement?->id;
                $departement = $arrondissement?->departement;
                $departementid = $arrondissement?->departement?->id;
                $regionid = $arrondissement?->departement?->region?->id;
            } elseif (!empty($request->input("departement")) && $projet?->type_localite == 'Departement') {
                $communeid = null;
                $arrondissementid = null;
                $departement = Departement::where('nom', $request->input("departement"))->first();
                $departementid = $departement?->id;
                $regionid = $departement?->region?->id;
            } elseif (!empty($request->input("departement")) && $projet?->type_localite == 'Region') {
                $communeid = null;
                $arrondissementid = null;
                $departement = Departement::where('nom', $request->input("departement"))->first();
                $departementid = $departement?->id;
                $regionid = $departement?->region?->id;
            } else {
                $departement = Departement::where('nom', $request->input("departement"))->first();
                $regionid = $departement?->region?->id;
            }

            $module_find    = DB::table('modules')->where('name', $request->input("module"))->first();

            $demandeur_ind = Individuelle::where('users_id', $user->id)->get();

            if (isset($module_find)) {
                foreach ($demandeur_ind as $key => $value) {
                    if ($value->module->name == $module_find->name) {
                        Alert::warning('Attention !', ' le module ' . $value->module->name . ' a déjà été choisi');
                        return redirect()->back();
                    }
                }
                $individuelle = new Individuelle([
                    'date_depot'                        =>  $date_depot,
                    'numero'                            =>  $numero_individuelle,
                    'adresse'                           =>  $request->input('adresse'),
                    'telephone'                         =>  $request->input('telephone_secondaire'),
                    'niveau_etude'                      =>  $request->input('niveau_etude'),
                    'diplome_academique'                =>  $request->input('diplome_academique'),
                    'autre_diplome_academique'          =>  $request->input('autre_diplome_academique'),
                    'option_diplome_academique'         =>  $request->input('option_diplome_academique'),
                    'etablissement_academique'          =>  $request->input('etablissement_academique'),
                    'diplome_professionnel'             =>  $request->input('diplome_professionnel'),
                    'autre_diplome_professionnel'       =>  $request->input('autre_diplome_professionnel'),
                    'specialite_diplome_professionnel'  =>  $request->input('specialite_diplome_professionnel'),
                    'etablissement_professionnel'       =>  $request->input('etablissement_professionnel'),
                    'projet_poste_formation'            =>  $request->input('projet_poste_formation'),
                    'projetprofessionnel'               =>  $request->input('projetprofessionnel'),
                    'qualification'                     =>  $request->input('qualification'),
                    'experience'                        =>  $request->input('experience'),
                    "departements_id"                   =>  $departementid,
                    "regions_id"                        =>  $regionid,
                    "communes_id"                       =>  $communeid,
                    "arrondissements_id"                =>  $arrondissementid,
                    "modules_id"                        =>  $module_find->id,
                    "projets_id"                        =>  $request?->idprojet,
                    'autre_module'                      =>  $request->input('module'),
                    'statut'                            => 'nouvelle',
                    'users_id'                          =>  $user->id,
                ]);
            } else {
                $module = new Module([
                    'name'            => $request->input('module'),
                ]);

                $module->save();

                $individuelle = new Individuelle([
                    'date_depot'                        =>  $date_depot,
                    'numero'                            =>  $numero_individuelle,
                    'adresse'                           =>  $request->input('adresse'),
                    'telephone'                         =>  $request->input('telephone_secondaire'),
                    'niveau_etude'                      =>  $request->input('niveau_etude'),
                    'diplome_academique'                =>  $request->input('diplome_academique'),
                    'autre_diplome_academique'          =>  $request->input('autre_diplome_academique'),
                    'option_diplome_academique'         =>  $request->input('option_diplome_academique'),
                    'etablissement_academique'          =>  $request->input('etablissement_academique'),
                    'diplome_professionnel'             =>  $request->input('diplome_professionnel'),
                    'autre_diplome_professionnel'       =>  $request->input('autre_diplome_professionnel'),
                    'specialite_diplome_professionnel'  =>  $request->input('specialite_diplome_professionnel'),
                    'etablissement_professionnel'       =>  $request->input('etablissement_professionnel'),
                    'projet_poste_formation'            =>  $request->input('projet_poste_formation'),
                    'projetprofessionnel'               =>  $request->input('projetprofessionnel'),
                    'qualification'                     =>  $request->input('qualification'),
                    'experience'                        =>  $request->input('experience'),
                    "departements_id"                   =>  $departementid,
                    "regions_id"                        =>  $regionid,
                    "communes_id"                       =>  $communeid,
                    "arrondissements_id"                =>  $arrondissementid,
                    "modules_id"                        =>  $module->id,
                    "projets_id"                        =>  $request?->idprojet,
                    'autre_module'                      =>  $request->input('module'),
                    'statut'                            => 'nouvelle',
                    'users_id'                          =>  $user->id,
                ]);
            }
        }

        $individuelle->save();

        Alert::success('Enregistrée ! ', 'demande ajoutée avec succès');

        return Redirect::back();
    }

    public function addIndividuelle(Request $request)
    {
        $this->validate($request, [
            'civilite'                      => ["required", "string"],
            'date_depot'                    => ["required", "date"],
            "cin"                           => ["required", "string", "min:13", "max:15", Rule::unique(User::class)],
            'firstname'                     => ['required', 'string', 'max:50'],
            'lastname'                      => ['required', 'string', 'max:25'],
            'telephone'                     => ['required', 'string', 'min:9', 'max:9'],
            'telephone_secondaire'          => ['required', 'string', 'min:9', 'max:9'],
            'date_naissance'                => ['required', 'date'],
            'lieu_naissance'                => ['required', 'string'],
            'adresse'                       => ['required', 'string', 'max:255'],
            'departement'                   => ['required', 'string', 'max:255'],
            'module'                        => ['required', 'string', 'max:255'],
            'situation_professionnelle'     => ['required', 'string', 'max:255'],
            'situation_familiale'           => ['required', 'string', 'max:255'],
            'niveau_etude'                  => ['required', 'string', 'max:255'],
            'diplome_academique'            => ['required', 'string', 'max:255'],
            'diplome_professionnel'         => ['required', 'string', 'max:255'],
            'projet_poste_formation'        => ['required', 'string', 'max:255'],
        ]);

        $cin  =   $request->input('cin');
        $cin  =   str_replace(' ', '', $cin);

        /* $rand = rand(0, 999);
        $letter1 = chr(rand(65, 90));
        $letter2 = chr(rand(65, 90));
        $random = $letter1.''.$rand . '' . $letter2;
        $longueur = strlen($random);

        if ($longueur == 1) {
            $numero_individuelle   =   strtoupper("0000" . $random);
        } elseif ($longueur >= 2 && $longueur < 3) {
            $numero_individuelle   =   strtoupper("000" . $random);
        } elseif ($longueur >= 3 && $longueur < 4) {
            $numero_individuelle   =   strtoupper("00" . $random);
        } elseif ($longueur >= 4 && $longueur < 5) {
            $numero_individuelle   =   strtoupper("0" . $random);
        } else {
            $numero_individuelle   =   strtoupper($random);
        } */

        /* $annee = date('y');
        $numero_individuelle = Individuelle::get()->last();
        if (isset($numero_individuelle)) {
            $numero_individuelle = Individuelle::get()->last()->numero;
            $numero_individuelle = ++$numero_individuelle;
            $longueur = strlen($numero_individuelle);
            if ($longueur <= 1) {
                $numero_individuelle   =   strtolower("0000" . $numero_individuelle);
            } elseif ($longueur >= 2 && $longueur < 3) {
                $numero_individuelle   =   strtolower("000" . $numero_individuelle);
            } elseif ($longueur >= 3 && $longueur < 4) {
                $numero_individuelle   =   strtolower("00" . $numero_individuelle);
            } elseif ($longueur >= 4 && $longueur < 5) {
                $numero_individuelle   =   strtolower("0" . $numero_individuelle);
            } else {
                $numero_individuelle   =   strtolower($numero_individuelle);
            }
        } else {
            $numero_individuelle = "00001";
            $numero_individuelle = 'I' . $annee . $numero_individuelle;
        } */


        $anneeEnCours = date('Y');
        $an = date('y');

        $numero_individuelle = Individuelle::join('users', 'users.id', 'individuelles.users_id')
            ->select('individuelles.*')
            ->where('date_depot',  "LIKE",  "{$anneeEnCours}%")
            ->get()->last();

        if (isset($numero_individuelle)) {
            $numero_individuelle = Individuelle::join('users', 'users.id', 'individuelles.users_id')
                ->select('individuelles.*')
                ->get()->last()->numero;
            $numero_individuelle = ++$numero_individuelle;
        } else {
            $numero_individuelle = $an . "0001";
            $numero_individuelle = 'I' . $numero_individuelle;
        }

        $longueur = strlen($numero_individuelle);

        if ($longueur <= 1) {
            $numero_individuelle   =   strtolower("00000" . $numero_individuelle);
        } elseif ($longueur >= 2 && $longueur < 3) {
            $numero_individuelle   =   strtolower("0000" . $numero_individuelle);
        } elseif ($longueur >= 3 && $longueur < 4) {
            $numero_individuelle   =   strtolower("000" . $numero_individuelle);
        } elseif ($longueur >= 4 && $longueur < 5) {
            $numero_individuelle   =   strtolower("00" . $numero_individuelle);
        } elseif ($longueur >= 5 && $longueur < 6) {
            $numero_individuelle   =   strtolower("0" . $numero_individuelle);
        } else {
            $numero_individuelle   =   strtolower($numero_individuelle);
        }

        $numero_individuelle = strtoupper($numero_individuelle);


        $departement = Departement::where('nom', $request->input("departement"))->first();
        $regionid = $departement->region->id;

        $module_find    = DB::table('modules')->where('name', $request->input("module"))->first();

        $user = User::create([
            'civilite'                          => $request->input('civilite'),
            'cin'                               => $cin,
            'firstname'                         => $request->input('firstname'),
            'name'                              => $request->input('lastname'),
            'date_naissance'                    => $request->input('date_naissance'),
            'lieu_naissance'                    => $request->input('lieu_naissance'),
            'email'                             => $request->input('email'),
            'telephone'                         => $request->input('telephone'),
            'telephone_secondaire'              => $request->input('telephone_secondaire'),
            'situation_familiale'               => $request->input('situation_familiale'),
            'situation_professionnelle'         => $request->input('situation_professionnelle'),
            'adresse'                           => $request->input('adresse'),
            'password'                          => Hash::make($request->email),
        ]);

        $user->save();

        $user->update([
            'username'                          => $request->input('lastname') . '' . $user->id,
        ]);

        $user->save();

        $user->assignRole('Demandeur');

        if (isset($module_find)) {
            $individuelle = new Individuelle([
                'date_depot'                        =>  $request->input('date_depot'),
                'numero'                            =>  $numero_individuelle,
                'telephone'                         =>  $request->input('telephone_secondaire'),
                'niveau_etude'                      =>  $request->input('niveau_etude'),
                'diplome_academique'                =>  $request->input('diplome_academique'),
                'autre_diplome_academique'          =>  $request->input('autre_diplome_academique'),
                'option_diplome_academique'         =>  $request->input('option_diplome_academique'),
                'etablissement_academique'          =>  $request->input('etablissement_academique'),
                'diplome_professionnel'             =>  $request->input('diplome_professionnel'),
                'autre_diplome_professionnel'       =>  $request->input('autre_diplome_professionnel'),
                'specialite_diplome_professionnel'  =>  $request->input('specialite_diplome_professionnel'),
                'etablissement_professionnel'       =>  $request->input('etablissement_professionnel'),
                'projet_poste_formation'            =>  $request->input('projet_poste_formation'),
                'projetprofessionnel'               =>  $request->input('projetprofessionnel'),
                'qualification'                     =>  $request->input('qualification'),
                'experience'                        =>  $request->input('experience'),
                'adresse'                           =>  $request->input('adresse'),
                "departements_id"                   =>  $departement->id,
                "regions_id"                        =>  $regionid,
                "modules_id"                        =>  $module_find->id,
                /* 'autre_module'                      =>  $request->input('autre_module'), */
                'statut'                            => 'nouvelle',
                'users_id'                          =>  $user->id,
            ]);
        } else {
            $module = new Module([
                'name'            => $request->input('module'),
            ]);

            $module->save();

            $individuelle = new Individuelle([
                'date_depot'                        =>  $request->input('date_depot'),
                'numero'                            =>  $numero_individuelle,
                'niveau_etude'                      =>  $request->input('niveau_etude'),
                'telephone'                         =>  $request->input('telephone_secondaire'),
                'diplome_academique'                =>  $request->input('diplome_academique'),
                'autre_diplome_academique'          =>  $request->input('autre_diplome_academique'),
                'option_diplome_academique'         =>  $request->input('option_diplome_academique'),
                'etablissement_academique'          =>  $request->input('etablissement_academique'),
                'diplome_professionnel'             =>  $request->input('diplome_professionnel'),
                'autre_diplome_professionnel'       =>  $request->input('autre_diplome_professionnel'),
                'specialite_diplome_professionnel'  =>  $request->input('specialite_diplome_professionnel'),
                'etablissement_professionnel'       =>  $request->input('etablissement_professionnel'),
                'projet_poste_formation'            =>  $request->input('projet_poste_formation'),
                'projetprofessionnel'               =>  $request->input('projetprofessionnel'),
                'qualification'                     =>  $request->input('qualification'),
                'experience'                        =>  $request->input('experience'),
                'adresse'                           =>  $request->input('adresse'),
                "departements_id"                   =>  $departement->id,
                "regions_id"                        =>  $regionid,
                "modules_id"                        =>  $module->id,
                /* 'autre_module'                      =>  $request->input('autre_module'), */
                'statut'                            => 'nouvelle',
                'users_id'                          =>  $user->id,
            ]);
        }

        $individuelle->save();

        Alert::success('Enregistrée ! ', 'demande ajoutée avec succès');

        return redirect()->back();
    }

    public function edit($id)
    {
        $individuelle       = Individuelle::findOrFail($id);
        $departements       = Departement::orderBy("created_at", "desc")->get();
        $modules            = Module::orderBy("created_at", "desc")->get();
        $projets            = Projet::orderBy("created_at", "desc")->get();

        if ($individuelle->projet && $individuelle->projet->statut != 'ouvert') {
            Alert::warning('Attention ! ', 'impossible de modifier');
            return redirect()->back();
        } elseif ($individuelle->statut != 'nouvelle') {
            Alert::warning('Attention ! ', 'action impossible demande déjà traitée');
            return redirect()->back();
        } else {
            return view("individuelles.update", compact("individuelle", "departements", "modules", "projets"));
        }
    }
    public function update(Request $request, $id)
    {
        $individuelle       = Individuelle::findOrFail($id);
        $user_id            = $individuelle?->users_id;

        $this->validate($request, [
            'telephone_secondaire'          => ['required', 'string', 'min:9', 'max:9'],
            'adresse'                       => ['required', 'string', 'max:255'],
            'departement'                   => ['required', 'string', 'max:255'],
            'module'                        => ['required', 'string', 'max:255'],
            'niveau_etude'                  => ['required', 'string', 'max:255'],
            'diplome_academique'            => ['required', 'string', 'max:255'],
            'diplome_professionnel'         => ['required', 'string', 'max:255'],
            'projet_poste_formation'        => ['required', 'string', 'max:255'],
        ]);

        $projet = Projet::where('sigle', $request->input("projet"))->first();

        if (!empty($request->input("departement")) && $projet?->type_localite == 'Commune') {
            $commune = Commune::where('nom', $request->input("departement"))->first();
            $communeid = $commune?->id;
            $arrondissement = $commune?->arrondissement;
            $arrondissementid = $commune?->arrondissement?->id;
            $departement = $commune?->arrondissement?->departement;
            $departementid = $commune?->arrondissement?->departement?->id;
            $regionid = $commune?->arrondissement?->departement?->region?->id;
        } elseif (!empty($request->input("departement")) && $projet?->type_localite == 'Arrondissement') {
            $communeid = null;
            $arrondissement = Arrondissement::where('nom', $request->input("departement"))->first();
            $arrondissementid = $arrondissement?->id;
            $departement = $arrondissement?->departement;
            $departementid = $arrondissement?->departement?->id;
            $regionid = $arrondissement?->departement?->region?->id;
        } elseif (!empty($request->input("departement")) && $projet?->type_localite == 'Departement') {
            $communeid = null;
            $arrondissementid = null;
            $departement = Departement::where('nom', $request->input("departement"))->first();
            $departementid = $departement?->id;
            $regionid = $departement?->region?->id;
        } elseif (!empty($request->input("departement")) && $projet?->type_localite == 'Region') {
            $communeid = null;
            $arrondissementid = null;
            $departement = Departement::where('nom', $request->input("departement"))->first();
            $departementid = $departement->id;
            $regionid = $departement?->region?->id;
        } else {
            $departement = Departement::where('nom', $request->input("departement"))->first();
            $departementid = $departement->id;
            $regionid = $departement?->region?->id;
            $communeid = null;
            $arrondissementid = null;
        }

        $user               = Auth::user();

        $module_find    = DB::table('modules')->where('name', $request->input("module"))->first();

        $demandeur_ind  = Individuelle::where('users_id', $user->id)->get();

        if (!empty($projet)) {
            $projetid = $projet?->id;
        } else {
            $projetid = null;
        }

        if (isset($module_find)) {
            if (isset($individuelle->module) && ($individuelle->module->name == $module_find->name)) {
                $individuelle->update([
                    'niveau_etude'                      =>  $request->input('niveau_etude'),
                    'telephone'                         =>  $request->input('telephone_secondaire'),
                    'diplome_academique'                =>  $request->input('diplome_academique'),
                    'autre_diplome_academique'          =>  $request->input('autre_diplome_academique'),
                    'option_diplome_academique'         =>  $request->input('option_diplome_academique'),
                    'etablissement_academique'          =>  $request->input('etablissement_academique'),
                    'diplome_professionnel'             =>  $request->input('diplome_professionnel'),
                    'autre_diplome_professionnel'       =>  $request->input('autre_diplome_professionnel'),
                    'specialite_diplome_professionnel'  =>  $request->input('specialite_diplome_professionnel'),
                    'etablissement_professionnel'       =>  $request->input('etablissement_professionnel'),
                    'projet_poste_formation'            =>  $request->input('projet_poste_formation'),
                    'projetprofessionnel'               =>  $request->input('projetprofessionnel'),
                    'qualification'                     =>  $request->input('qualification'),
                    'adresse'                           =>  $request->input('adresse'),
                    'experience'                        =>  $request->input('experience'),
                    "departements_id"                   =>  $departementid,
                    "regions_id"                        =>  $regionid,
                    "communes_id"                       =>  $communeid,
                    "arrondissements_id"                =>  $arrondissementid,
                    "projets_id"                        =>  $projetid,
                    'users_id'                          =>  $user_id,
                ]);
            } elseif (isset($module_find)) {
                foreach ($demandeur_ind as $value) {
                    if ($value->module->name == $module_find->name) {
                        Alert::warning('Attention !', ' le module ' . $value->module->name . ' a déjà été choisi');
                        return redirect()->back();
                    }
                }
                $individuelle->update([
                    'niveau_etude'                      =>  $request->input('niveau_etude'),
                    'telephone'                         =>  $request->input('telephone_secondaire'),
                    'diplome_academique'                =>  $request->input('diplome_academique'),
                    'autre_diplome_academique'          =>  $request->input('autre_diplome_academique'),
                    'option_diplome_academique'         =>  $request->input('option_diplome_academique'),
                    'etablissement_academique'          =>  $request->input('etablissement_academique'),
                    'diplome_professionnel'             =>  $request->input('diplome_professionnel'),
                    'autre_diplome_professionnel'       =>  $request->input('autre_diplome_professionnel'),
                    'specialite_diplome_professionnel'  =>  $request->input('specialite_diplome_professionnel'),
                    'etablissement_professionnel'       =>  $request->input('etablissement_professionnel'),
                    'projet_poste_formation'            =>  $request->input('projet_poste_formation'),
                    'projetprofessionnel'               =>  $request->input('projetprofessionnel'),
                    'qualification'                     =>  $request->input('qualification'),
                    'adresse'                           =>  $request->input('adresse'),
                    'experience'                        =>  $request->input('experience'),
                    "departements_id"                   =>  $departementid,
                    "regions_id"                        =>  $regionid,
                    "communes_id"                       =>  $communeid,
                    "arrondissements_id"                =>  $arrondissementid,
                    "projets_id"                        =>  $projetid,
                    "modules_id"                        =>  $module_find->id,
                    /* 'autre_module'                      =>  $request->input('autre_module'), */
                    'users_id'                          =>  $user_id,
                ]);
            } else {

                $module = new Module([
                    'name'            => $request->input('module'),
                ]);

                $module->save();

                $individuelle->update([
                    'niveau_etude'                      =>  $request->input('niveau_etude'),
                    'telephone'                         =>  $request->input('telephone_secondaire'),
                    'diplome_academique'                =>  $request->input('diplome_academique'),
                    'autre_diplome_academique'          =>  $request->input('autre_diplome_academique'),
                    'option_diplome_academique'         =>  $request->input('option_diplome_academique'),
                    'etablissement_academique'          =>  $request->input('etablissement_academique'),
                    'diplome_professionnel'             =>  $request->input('diplome_professionnel'),
                    'autre_diplome_professionnel'       =>  $request->input('autre_diplome_professionnel'),
                    'specialite_diplome_professionnel'  =>  $request->input('specialite_diplome_professionnel'),
                    'etablissement_professionnel'       =>  $request->input('etablissement_professionnel'),
                    'projet_poste_formation'            =>  $request->input('projet_poste_formation'),
                    'projetprofessionnel'               =>  $request->input('projetprofessionnel'),
                    'qualification'                     =>  $request->input('qualification'),
                    'adresse'                           =>  $request->input('adresse'),
                    'experience'                        =>  $request->input('experience'),
                    "departements_id"                   =>  $departementid,
                    "regions_id"                        =>  $regionid,
                    "communes_id"                       =>  $communeid,
                    "arrondissements_id"                =>  $arrondissementid,
                    "projets_id"                        =>  $projetid,
                    "modules_id"                        =>  $module->id,
                    /* 'autre_module'                      =>  $request->input('autre_module'), */
                    'users_id'                          =>  $user_id,
                ]);
            }

            $individuelle->save();
        } else {


            $module = new Module([
                'name'            => $request->input('module'),
            ]);

            $module->save();

            $individuelle->update([
                'niveau_etude'                      =>  $request->input('niveau_etude'),
                'telephone'                         =>  $request->input('telephone_secondaire'),
                'diplome_academique'                =>  $request->input('diplome_academique'),
                'autre_diplome_academique'          =>  $request->input('autre_diplome_academique'),
                'option_diplome_academique'         =>  $request->input('option_diplome_academique'),
                'etablissement_academique'          =>  $request->input('etablissement_academique'),
                'diplome_professionnel'             =>  $request->input('diplome_professionnel'),
                'autre_diplome_professionnel'       =>  $request->input('autre_diplome_professionnel'),
                'specialite_diplome_professionnel'  =>  $request->input('specialite_diplome_professionnel'),
                'etablissement_professionnel'       =>  $request->input('etablissement_professionnel'),
                'projet_poste_formation'            =>  $request->input('projet_poste_formation'),
                'projetprofessionnel'               =>  $request->input('projetprofessionnel'),
                'qualification'                     =>  $request->input('qualification'),
                'adresse'                           =>  $request->input('adresse'),
                'experience'                        =>  $request->input('experience'),
                "departements_id"                   =>  $departementid,
                "regions_id"                        =>  $regionid,
                "communes_id"                       =>  $communeid,
                "arrondissements_id"                =>  $arrondissementid,
                "projets_id"                        =>  $projetid,
                "modules_id"                        =>  $module->id,
                /* 'autre_module'                      =>  $request->input('autre_module'), */
                'users_id'                          =>  $user_id,
            ]);

            $individuelle->save();
        }

        Alert::success('Modification ! ', 'demande modifiée avec succès');
        /* return Redirect::route("demandesIndividuelle"); */
        return Redirect::back();
    }

    public function show($id)
    {
        $individuelle = Individuelle::findOrFail($id);
        return view("individuelles.show", compact("individuelle"));
    }

    public function rejeterIndividuelle(Request $request)
    {
        $request->validate([
            'motif' => 'required',
            'string'
        ]);

        $individuelle = Individuelle::findOrFail($request->input('id'));
        $individuelle->numero = $request->input('motif');
        $individuelle->save();

        return redirect()->route('modal')->with('success', 'Région modifiée avec succès');
    }
    public function destroy($id)
    {
        $individuelle   = Individuelle::find($id);

        if ($individuelle->statut != 'nouvelle') {
            Alert::warning('Attention ! ', 'action impossible demande déjà traitée');
            return redirect()->back();
        } else {
            $individuelle->update([
                'numero'        => $individuelle->numero . '/' . $id,
            ]);

            $individuelle->save();

            $individuelle->delete();

            Alert::success('Fait !', 'demande supprimée');

            return redirect()->back();
        }
    }
    public function validationsRejetMessage(Request $request, $id)
    {
        $individuelle = Individuelle::findOrFail($id);
        return view("individuelles.validationsrejetmessage", compact('individuelle'));
    }

    public function demandesIndividuelle()
    {
        $departements = Departement::orderBy("created_at", "desc")->get();
        $modules = Module::orderBy("created_at", "desc")->get();
        $user = Auth::user();
        $individuelles = Individuelle::where('users_id', $user->id)
            ->where('numero', '!=', null)
            ->where('projets_id',  null)
            ->get();
        $individuelle_total = $individuelles->count();

        if ($individuelle_total == 0) {
            return view(
                "individuelles.show-individuelle-aucune",
                compact(
                    "individuelle_total",
                    "departements",
                    "individuelles",
                    "modules"
                )
            );
        } else {
            return view(
                "individuelles.show-individuelle",
                compact(
                    "individuelle_total",
                    "departements",
                    "individuelles",
                    "modules"
                )
            );
        }
    }

    public function rapports(Request $request)
    {
        $title = 'rapports demandes individuelles';
        return view('individuelles.rapports', compact(
            'title'
        ));
    }
    public function generateRapport(Request $request)
    {

        $this->validate($request, [
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        $now =  Carbon::now()->format('H:i:s');

        $from_date = date_format(date_create($request->from_date), 'd/m/Y');

        $to_date = date_format(date_create($request->to_date), 'd/m/Y');

        $individuelles = Individuelle::whereBetween(DB::raw('DATE(created_at)'), array($request->from_date, $request->to_date))->get();

        $count = $individuelles->count();

        if ($from_date == $to_date) {
            if (isset($count) && $count < "1") {
                $title = 'aucune demande individuelle reçue le ' . $from_date;
            } elseif (isset($count) && $count == "1") {
                $title = $count . ' demande individuelle reçue le ' . $from_date;
            } else {
                $title = $count . ' demandes individuelles reçues le ' . $from_date;
            }
        } else {
            if (isset($count) && $count < "1") {
                $title = 'aucune demande individuelle reçue entre le ' . $from_date . ' et le ' . $to_date;
            } elseif (isset($count) && $count == "1") {
                $title = $count . ' demande individuelle reçue entre le ' . $from_date . ' et le ' . $to_date;
            } else {
                $title = $count . ' demandes individuelles reçues entre le ' . $from_date . ' et le ' . $to_date;
            }
        }

        return view('individuelles.rapports', compact(
            'individuelles',
            'from_date',
            'to_date',
            'title'
        ));
    }

    public function generateReport(Request $request)
    {
        $this->validate($request, [
            'cin'               => 'nullable|string',
            'name'              => 'nullable|string',
            'firstname'         => 'nullable|string',
            'telephone'         => 'nullable|string',
            'email'             => 'nullable|email',
        ]);

        if ($request?->cin == null && $request->firstname == null && $request->telephone == null && $request->name == null && $request->email == null) {
            Alert::warning('Attention ', 'Renseigner au moins un champ pour rechercher');
            return redirect()->back();
        }

        $individuelles = Individuelle::join('users', 'users.id', 'individuelles.users_id')
            ->select('individuelles.*')
            ->where('users.firstname', 'LIKE', "%{$request?->firstname}%")
            ->where('users.name', 'LIKE', "%{$request?->name}%")
            ->where('users.cin', 'LIKE', "%{$request?->cin}%")
            ->where('users.telephone', 'LIKE', "%{$request?->telephone}%")
            ->where('users.email', 'LIKE', "%{$request?->email}%")
            ->distinct()
            ->get();

        $count = $individuelles?->count();

        if (isset($count) && $count < "1") {
            $title = 'aucune demande trouvée';
        } elseif (isset($count) && $count == "1") {
            $title = $count . ' demande trouvée';
        } else {
            $title = $count . ' demandes trouvées';
        }

        $departements = Departement::orderBy("created_at", "DESC")->get();
        /* $modules = Module::orderBy("created_at", "desc")->get(); */

        return view('individuelles.index', compact(
            'individuelles',
            'departements',
            'title'
        ));
    }

    public function showIndividuelleProjet(Request $request)
    {
        $projet = Projet::findOrFail($request->idprojet);
        $this->validate($request, [
            'telephone_secondaire'          => ['required', 'string', 'max:9', 'min:9'],
            'adresse'                       => ['required', 'string', 'max:255'],
            'departement'                   => ['required', 'string', 'max:255'],
            'module'                        => ['required', 'string', 'max:255'],
            'niveau_etude'                  => ['required', 'string', 'max:255'],
            'diplome_academique'            => ['required', 'string', 'max:255'],
            'diplome_professionnel'         => ['required', 'string', 'max:255'],
            'projet_poste_formation'        => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();

        $individuelle_total = Individuelle::where('users_id', $user->id)->where('projets_id', $projet->id)
            ->count();

        if ($individuelle_total >= 3) {
            Alert::warning('Attention ! ', 'Vous avez atteint le nombre de demandes autoriées');
            return redirect()->back();
        } else {

            $date_depot =   date('Y-m-d');

            $anneeEnCours = date('Y');
            $an = date('y');

            $numero_individuelle = Individuelle::join('users', 'users.id', 'individuelles.users_id')
                ->select('individuelles.*')
                ->where('date_depot',  "LIKE",  "{$anneeEnCours}%")
                ->get()->last();

            if (isset($numero_individuelle)) {
                $numero_individuelle = Individuelle::join('users', 'users.id', 'individuelles.users_id')
                    ->select('individuelles.*')
                    ->get()->last()->numero;
                $numero_individuelle = ++$numero_individuelle;
            } else {
                $numero_individuelle = $an . "0001";
                $numero_individuelle = 'I' . $numero_individuelle;
            }

            $longueur = strlen($numero_individuelle);

            if ($longueur <= 1) {
                $numero_individuelle   =   strtolower("00000" . $numero_individuelle);
            } elseif ($longueur >= 2 && $longueur < 3) {
                $numero_individuelle   =   strtolower("0000" . $numero_individuelle);
            } elseif ($longueur >= 3 && $longueur < 4) {
                $numero_individuelle   =   strtolower("000" . $numero_individuelle);
            } elseif ($longueur >= 4 && $longueur < 5) {
                $numero_individuelle   =   strtolower("00" . $numero_individuelle);
            } elseif ($longueur >= 5 && $longueur < 6) {
                $numero_individuelle   =   strtolower("0" . $numero_individuelle);
            } else {
                $numero_individuelle   =   strtolower($numero_individuelle);
            }


            $numero_individuelle = strtoupper($numero_individuelle);

            if (!empty($request->input("departement")) && $projet?->type_localite == 'Commune') {
                $commune = Commune::where('nom', $request->input("departement"))->first();
                $communeid = $commune?->id;
                $arrondissement = $commune?->arrondissement;
                $arrondissementid = $commune?->arrondissement?->id;
                $departement = $commune?->arrondissement?->departement;
                $departementid = $commune?->arrondissement?->departement?->id;
                $regionid = $commune?->arrondissement?->departement?->region?->id;
            } elseif (!empty($request->input("departement")) && $projet?->type_localite == 'Arrondissement') {
                $communeid = null;
                $arrondissement = Arrondissement::where('nom', $request->input("departement"))->first();
                $arrondissementid = $arrondissement?->id;
                $departement = $arrondissement?->departement;
                $departementid = $arrondissement?->departement?->id;
                $regionid = $arrondissement?->departement?->region?->id;
            } elseif (!empty($request->input("departement")) && $projet?->type_localite == 'Departement') {
                $communeid = null;
                $arrondissementid = null;
                $departement = Departement::where('nom', $request->input("departement"))->first();
                $departementid = $departement?->id;
                $regionid = $departement?->region?->id;
            } elseif (!empty($request->input("departement")) && $projet?->type_localite == 'Region') {
                $communeid = null;
                $arrondissementid = null;
                $departement = Departement::where('nom', $request->input("departement"))->first();
                $departementid = $departement?->id;
                $regionid = $departement?->region?->id;
            } else {
                $departement = Departement::where('nom', $request->input("departement"))->first();
                $regionid = $departement?->region?->id;
            }

            $module_find    = DB::table('modules')->where('name', $request->input("module"))->first();

            $demandeur_ind = Individuelle::where('users_id', $user->id)->where('projets_id', $projet->id)->get();

            if (isset($module_find)) {
                foreach ($demandeur_ind as $key => $value) {
                    if ($value->module->name == $module_find->name) {
                        Alert::warning('Attention ! le module ' . $value->module->name, 'a déjà été choisi');
                        return redirect()->back();
                    }
                }
                $individuelle = new Individuelle([
                    'date_depot'                        =>  $date_depot,
                    'numero'                            =>  $numero_individuelle,
                    'adresse'                           =>  $request->input('adresse'),
                    'telephone'                         =>  $request->input('telephone_secondaire'),
                    'niveau_etude'                      =>  $request->input('niveau_etude'),
                    'diplome_academique'                =>  $request->input('diplome_academique'),
                    'autre_diplome_academique'          =>  $request->input('autre_diplome_academique'),
                    'option_diplome_academique'         =>  $request->input('option_diplome_academique'),
                    'etablissement_academique'          =>  $request->input('etablissement_academique'),
                    'diplome_professionnel'             =>  $request->input('diplome_professionnel'),
                    'autre_diplome_professionnel'       =>  $request->input('autre_diplome_professionnel'),
                    'specialite_diplome_professionnel'  =>  $request->input('specialite_diplome_professionnel'),
                    'etablissement_professionnel'       =>  $request->input('etablissement_professionnel'),
                    'projet_poste_formation'            =>  $request->input('projet_poste_formation'),
                    'projetprofessionnel'               =>  $request->input('projetprofessionnel'),
                    'qualification'                     =>  $request->input('qualification'),
                    'experience'                        =>  $request->input('experience'),
                    'autre_module'                      =>  $request->input('module'),
                    "communes_id"                       =>  $communeid,
                    "arrondissements_id"                =>  $arrondissementid,
                    "departements_id"                   =>  $departementid,
                    "regions_id"                        =>  $regionid,
                    "modules_id"                        =>  $module_find->id,
                    /* 'autre_module'                      =>  $request->input('autre_module'), */
                    'statut'                            => 'nouvelle',
                    'users_id'                          =>  $user->id,
                    'projets_id'                        =>  $projet->id,
                ]);
            } else {
                $module = new Module([
                    'name'            => $request->input('module'),
                ]);

                $module->save();

                $individuelle = new Individuelle([
                    'date_depot'                        =>  $date_depot,
                    'numero'                            =>  $numero_individuelle,
                    'adresse'                           =>  $request->input('adresse'),
                    'telephone'                         =>  $request->input('telephone_secondaire'),
                    'niveau_etude'                      =>  $request->input('niveau_etude'),
                    'diplome_academique'                =>  $request->input('diplome_academique'),
                    'autre_diplome_academique'          =>  $request->input('autre_diplome_academique'),
                    'option_diplome_academique'         =>  $request->input('option_diplome_academique'),
                    'etablissement_academique'          =>  $request->input('etablissement_academique'),
                    'diplome_professionnel'             =>  $request->input('diplome_professionnel'),
                    'autre_diplome_professionnel'       =>  $request->input('autre_diplome_professionnel'),
                    'specialite_diplome_professionnel'  =>  $request->input('specialite_diplome_professionnel'),
                    'etablissement_professionnel'       =>  $request->input('etablissement_professionnel'),
                    'projet_poste_formation'            =>  $request->input('projet_poste_formation'),
                    'projetprofessionnel'               =>  $request->input('projetprofessionnel'),
                    'qualification'                     =>  $request->input('qualification'),
                    'experience'                        =>  $request->input('experience'),
                    'autre_module'                      =>  $request->input('module'),
                    "communes_id"                       =>  $communeid,
                    "arrondissements_id"                =>  $arrondissementid,
                    "departements_id"                   =>  $departementid,
                    "regions_id"                        =>  $regionid,
                    "modules_id"                        =>  $module->id,
                    /* 'autre_module'                      =>  $request->input('autre_module'), */
                    'statut'                            => 'nouvelle',
                    'users_id'                          =>  $user->id,
                    'projets_id'                        =>  $projet->id,
                ]);
            }
        }

        $individuelle->save();

        Alert::success('Enregistrée ! ', 'demande ajoutée avec succès');

        return Redirect::back();
    }

    public function showMasculin()
    {
        $individuelles = Individuelle::join('users', 'users.id', 'individuelles.users_id')
            ->select('individuelles.*')
            ->where('users.civilite', 'M.')
            ->limit(500)
            ->latest()
            ->get();
            
        $total_count = Individuelle::get();
        $total_count = number_format($total_count->count(), 0, ',', ' ');

        $count_demandeur = number_format($individuelles?->count(), 0, ',', ' ');

        if ($count_demandeur < "1") {
            $title = 'Aucune demande individuelle masculine';
        } elseif ($count_demandeur == "1") {
            $title = $count_demandeur . ' demande individuelle masculine sur un total de ' . $total_count;
        } else {
            $title = 'Liste des ' . $count_demandeur . ' dernières demandes individuelles masculines sur un total de ' . $total_count;
        }

        $departements = Departement::orderBy("created_at", "DESC")->get();
        $modules = Module::orderBy("created_at", "desc")->get();

        return view(
            "individuelles.masculin",
            compact('individuelles', 'departements', 'modules', 'title')
        );
    }

    public function showFeminin()
    {
        $individuelles = Individuelle::join('users', 'users.id', 'individuelles.users_id')
            ->select('individuelles.*')
            ->where('users.civilite', 'Mme')
            ->limit(500)
            ->latest()
            ->get();
            
        $total_count = Individuelle::get();
        $total_count = number_format($total_count->count(), 0, ',', ' ');

        $count_demandeur = number_format($individuelles?->count(), 0, ',', ' ');

        if ($count_demandeur < "1") {
            $title = 'Aucune demande individuelle féminine';
        } elseif ($count_demandeur == "1") {
            $title = $count_demandeur . ' demande individuelle féminine sur un total de ' . $total_count;
        } else {
            $title = 'Liste des ' . $count_demandeur . ' dernières demandes individuelles féminines sur un total de ' . $total_count;
        }

        $departements = Departement::orderBy("created_at", "DESC")->get();
        $modules = Module::orderBy("created_at", "desc")->get();

        return view(
            "individuelles.feminin",
            compact('individuelles', 'departements', 'modules', 'title')
        );
    }
}
