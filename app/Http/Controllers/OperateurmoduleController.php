<?php

namespace App\Http\Controllers;

use App\Models\Moduleoperateurstatut;
use App\Models\Operateur;
use App\Models\Operateurmodule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OperateurmoduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|DIOF|DEC|DPP|Operateur']);
    }
    public function index()
    {
        $operateurmodules = Operateurmodule::take(50)
            ->latest()
            ->get();
        $module_statuts = Operateurmodule::get()->unique('statut');
        $operateurs = Operateur::orderBy('created_at', 'desc')->get();
        return view(
            "operateurmodules.index",
            compact(
                "operateurmodules",
                "operateurs",
                "module_statuts",
            )
        );
    }

    public function store(Request $request)
    {
        /* $this->validate($request, [
            'modules.*.module' => 'required|unique:operateurmodules,module',
            'domaines.*.domaine' => 'required|unique:operateurmodules,domaine',
            'niveau_qualifications.*.niveau_qualification' => 'required|unique:operateurmodules,niveau_qualification',
        ]); */

        $this->validate($request, [
            'module'                => 'required|string',
            'domaine'               => 'required|string',
            'categorie'             => 'required|string',
            'niveau_qualification'  => 'required|string',
        ]);

        $total_module = Operateurmodule::where('operateurs_id', $request->input('operateur'))->count();
        $operateurmodule_find    = DB::table('operateurmodules')->where('module', $request->input("module"))->first();
        $operateur_find = Operateurmodule::where('operateurs_id', $request->input('operateur'))->get();

        $operateur = Operateur::findOrFail($request->input('operateur'));

        if (isset($operateurmodule_find)) {
            foreach ($operateur_find as $key => $value) {
                if ($value->module == $operateurmodule_find->module) {
                    Alert::warning('Attention ! ' . $value->module, 'a déjà été choisi');
                    return redirect()->back();
                }
            }

            $operateurmodule = new Operateurmodule([
                "module"                =>  $request->input("module"),
                "domaine"               =>  $request->input("domaine"),
                "categorie"             =>  $request->input("categorie"),
                'niveau_qualification'  =>  $request->input('niveau_qualification'),
                'statut'                =>  'nouveau',
                'operateurs_id'         =>  $request->input('operateur'),
            ]);

            $operateurmodule->save();
        } elseif ($operateur->user->categorie == 'Privé' && $total_module >= 30) {
            Alert::warning('Attention ! ', 'Vous avez atteint le nombre de modules autorisés');
            return redirect()->back();
        } elseif ($total_module >= 40) {
            Alert::warning('Attention ! ', 'Vous avez atteint le nombre de modules autorisés');
            return redirect()->back();
        } else {
            $operateurmodule = new Operateurmodule([
                "module"                =>  $request->input("module"),
                "domaine"               =>  $request->input("domaine"),
                "categorie"             =>  $request->input("categorie"),
                'niveau_qualification'  =>  $request->input('niveau_qualification'),
                'statut'                =>  'nouveau',
                'operateurs_id'         =>  $request->input('operateur'),
            ]);

            $operateurmodule->save();

            $moduleoperateurstatut = new Moduleoperateurstatut([
                'statut'                =>  "nouveau",
                'operateurmodules_id'   =>  $operateurmodule->id,

            ]);

            $moduleoperateurstatut->save();
        }

        Alert::success('Féliciations ! ', 'module ajouté avec succès');

        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'module'                => 'required|string',
            'domaine'               => 'required|string',
            'categorie'             => 'required|string',
            'niveau_qualification'  => 'required|string',
        ]);
        $operateurmodule = Operateurmodule::findOrFail($id);

        foreach (Auth::user()->roles as $key => $role) {
            if (!empty($role?->name) && ($role?->name != 'super-admin') && ($role?->name != 'admin') && ($role?->name != 'DIOF') && ($role?->name != 'DEC')) {
                if ($operateurmodule->statut != 'nouveau') {
                    Alert::warning('Attention ! ', 'action impossible module déjà traité');
                    return redirect()->back();
                }
            }
        }

        $operateurmodule_find    = DB::table('operateurmodules')->where('module', $request->input("module"))->first();

        /* $operateurmodule_count    = DB::table('operateurmodules')
            ->where('module', $request->input("module"))
            ->where('operateurs_id', $operateurmodule->operateurs_id)
            ->count(); */

        $operateur_find  = Operateurmodule::where('operateurs_id', $operateurmodule->operateurs_id)->get();

        if (!empty($operateurmodule_find) && $operateurmodule_find->module == $operateurmodule->module) {
            $operateurmodule->update([
                "module"                =>  $request->input("module"),
                "domaine"               =>  $request->input("domaine"),
                "categorie"             =>  $request->input("categorie"),
                'niveau_qualification'  =>  $request->input('niveau_qualification'),
                'operateurs_id'         =>  $operateurmodule->operateurs_id,
            ]);
            Alert::success($operateurmodule->module, 'mis à jour');
            $operateurmodule->save();
        } elseif (!empty($operateurmodule_find)) {
            foreach ($operateur_find as $value) {
                if (($value->module == $operateurmodule_find->module)) {
                    Alert::warning('Attention ! ' . $value->module, 'a déjà été choisi');
                    return redirect()->back();
                } else {
                    $operateurmodule->update([
                        "module"                =>  $request->input("module"),
                        "domaine"               =>  $request->input("domaine"),
                        "categorie"             =>  $request->input("categorie"),
                        'niveau_qualification'  =>  $request->input('niveau_qualification'),
                        'operateurs_id'         =>  $operateurmodule->operateurs_id,
                    ]);
                    Alert::success($operateurmodule->module, 'mis à jour');
                    $operateurmodule->save();
                    return redirect()->back();
                }
            }
        } else {
            $operateurmodule->update([
                "module"                =>  $request->input("module"),
                "domaine"               =>  $request->input("domaine"),
                "categorie"             =>  $request->input("categorie"),
                'niveau_qualification'  =>  $request->input('niveau_qualification'),
                'operateurs_id'         =>  $operateurmodule->operateurs_id,
            ]);

            Alert::success($operateurmodule->module, 'mis à jour');
            $operateurmodule->save();
        }
        return redirect()->back();
    }

    public function show($id)
    {
        $operateurmodule = Operateurmodule::findOrFail($id);
        $modulename = $operateurmodule->module;
        $operateurmodules   =   Operateurmodule::where('module', $modulename)->get();

        return view("operateurmodules.show", compact("operateurmodules", "modulename"));
    }
    public function destroy($id)
    {
        $operateurmodule = Operateurmodule::find($id);

        foreach (Auth::user()->roles as $role) {
            if (!empty($role?->name) && ($role?->name == 'super-admin')) {
                Alert::success('Effectuée !', 'module supprimée');
                $operateurmodule->delete();
                return redirect()->back();
            } elseif ($operateurmodule->statut != 'nouveau') {
                Alert::warning('Attention ! ', 'action impossible module déjà traité');
                return redirect()->back();
            } else {
                $operateurmodule->delete();
                Alert::success('Effectuée !', 'module supprimée');
                return redirect()->back();
            }
        }
    }
    public function rapports()
    {
        $operateurmodules = Operateurmodule::take(50)
            ->latest()
            ->get();
        $module_statuts = Operateurmodule::get()->unique('statut');
        $operateurs = Operateur::orderBy('created_at', 'desc')->get();
        return view(
            "operateurmodules.index",
            compact(
                "operateurmodules",
                "operateurs",
                "module_statuts",
            )
        );
    }
    public function generateRapport(Request $request)
    {
        $this->validate($request, [
            'module'    => 'nullable|string',
            'statut'    => 'nullable|string',
            'operateur' => 'nullable|string',
        ]);

        $operateurs = Operateur::orderBy('created_at', 'desc')->get();

        $module_statuts = Operateurmodule::get()->unique('statut');

        if ($request?->module == null && $request->statut == null && $request->operateur == null) {
            Alert::warning('Attention ', 'Renseigner au moins un champ pour rechercher');
            return redirect()->back();
        } elseif (!empty($request?->module)) {
            $operateurmodules = Operateurmodule::where('module', $request?->module)->get();
        } elseif (!empty($request?->statut)) {
            $operateurmodules = Operateurmodule::where('statut', $request?->statut)->get();
        } elseif (!empty($request?->operateur)) {
            $operateurmodules = Operateurmodule::where('operateurs_id', $request?->operateur)->get();
        } else {
            Alert::warning('Attention ', 'Renseigner au moins un champ pour rechercher');
        }

        return view('operateurmodules.index', compact(
            'operateurmodules',
            'operateurs',
            'module_statuts',
        ));
    }
}
