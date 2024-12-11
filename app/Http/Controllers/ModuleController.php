<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Domaine;
use App\Models\Individuelle;
use App\Models\Module;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class ModuleController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|DIOF|ADIOF']);
        /* $this->middleware(['permission:arrive-show']); */
        // or with specific guard
        /* $this->middleware(['role_or_permission:super-admin']); */
    }
    public function index()
    {
        $modules = Module::orderBy("created_at", "desc")->get();
        $domaines = Domaine::orderBy("created_at", "desc")->get();
        $regions = Region::orderBy("created_at", "desc")->get();

        $total_count = Module::count();

        $count_module = number_format($modules?->count(), 0, ',', ' ');

        if ($count_module < "1") {
            $title = 'Aucun module';
        } elseif ($count_module == "1") {
            $title = $count_module . ' module sur un total de ' . $total_count;
        } else {
            $title = 'Liste des ' . $count_module . ' modules sur un total de ' . $total_count;
        }

        return view(
            "modules.index",
            compact(
                "modules",
                "domaines",
                "regions",
                "title"
            )
        );
    }
    public function show($id)
    {
        $module = Module::find($id);
        return view("modules.show", compact("module"));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name"             => ["required", "string", Rule::unique(Module::class)->ignore($id)],
            "domaine"          => ["required", "string"],
        ]);

        $module = Module::findOrFail($id);

        $module->update([
            'name'            => $request->input('name'),
            'domaines_id'     => $request->input('domaine'),
        ]);

        $module->save();

        Alert::success('Fait ! ', 'module modifié avec succès');

        return redirect()->back();
    }

    public function modulelocalite($idlocalite, $idmodule)
    {
        $localite = Region::findOrFail($idlocalite);
        $module = Module::findOrFail($idmodule);

        $individuelles = Individuelle::where('regions_id', $idlocalite)->where('modules_id', $idmodule)->get();

        return view("modules.modulelocalite", compact("module", "localite", "individuelles"));
    }

    public function modulelocalitestatut($idlocalite, $idmodule, $statut)
    {
        $localite = Region::findOrFail($idlocalite);
        $module = Module::findOrFail($idmodule);

        $individuelles = Individuelle::where('regions_id', $idlocalite)
            ->where('modules_id', $idmodule)
            ->where('statut', $statut)->get();

        return view("modules.modulelocalitestatut", compact("module", "localite", "individuelles", "statut"));
    }

    public function modulestatut($statut, $idmodule)
    {
        $module = Module::findOrFail($idmodule);

        $individuelles = Individuelle::where('statut', $statut)->where('modules_id', $idmodule)->get();

        return view("modules.modulestatut", compact("module", "statut", "individuelles"));
    }

    public function modulestatutlocalite($idlocalite, $idmodule, $statut)
    {
        $localite = Region::findOrFail($idlocalite);
        $module = Module::findOrFail($idmodule);

        $individuelles = Individuelle::where('regions_id', $idlocalite)
            ->where('modules_id', $idmodule)
            ->where('statut', $statut)->get();


        return view("modules.modulestatutlocalite", compact("module", "localite", "individuelles", "statut"));
    }

    public function addModule(Request $request)
    {
        $this->validate($request, [
            "name"             => ["required", "string", Rule::unique(Module::class)],
            "domaine"          => ["nullable", "string"],
        ]);

        $module = Module::create([
            'name'            => $request->input('name'),
            'domaines_id'     => $request->input('domaine'),
        ]);

        $module->save();

        Alert::success('Fait ! ', 'module ajouté avec succès');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $module   = Module::find($id);

        $module->delete();

        Alert::success('Fait !', 'module supprimé');

        return redirect()->back();
    }
    public function rapports(Request $request)
    {
        $title = 'rapports opérateurs';
        $regions = Region::orderBy("created_at", "desc")->get();
        return view('modules.rapports', compact(
            'title',
            'regions',
        ));
    }
    public function generateRapport(Request $request)
    {
        $this->validate($request, [
            'region' => 'required|string',
            'module' => 'required|string',
            'statut' => 'required|string',
        ]);

        $region = Region::findOrFail($request->region);

        $individuelles = Individuelle::join('modules', 'individuelles.modules_id', 'modules.id')
            ->select('individuelles.*')
            ->where('statut', 'LIKE', "%{$request->statut}%")
            ->where('regions_id',  "{$request->region}")
            ->where('modules.name', 'LIKE', "%{$request->module}%")
            ->distinct()
            ->get();


        $count = $individuelles->count();

        if (isset($count) && $count <= "1") {
            $individuelle = 'demandeur';
            if (isset($request->statut) && $request->statut == "nouvelle") {
                $statut = 'nouveau';
            } elseif (isset($request->statut) && $request->statut == "former") {
                $statut = 'a terminé la formation';
            } elseif (isset($request->statut) && $request->statut == "rejeter") {
                $statut = 'rejeté';
            } elseif (isset($request->statut) && $request->statut == "attente") {
                $statut = 'en attente de formation';
            } elseif (isset($request->statut) && $request->statut == "retenu") {
                $statut = 'retenu';
            } else {
                $statut = $request->statut;
            }
        } else {
            $individuelle = 'demandeurs';
            if (isset($request->statut) && $request->statut == "nouvelle") {
                $statut = 'nouveaux';
            } elseif (isset($request->statut) && $request->statut == "former") {
                $statut = 'ont terminé leur formation';
            } elseif (isset($request->statut) && $request->statut == "rejeter") {
                $statut = 'rejetés';
            } elseif (isset($request->statut) && $request->statut == "attente") {
                $statut = 'en attente de formation';
            } elseif (isset($request->statut) && $request->statut == "retenu") {
                $statut = 'retenus';
            } else {
                $statut = $request->statut;
            }
        }
        $title = $count . ' ' . $individuelle . ' ' . $statut . ' en ' . $request->module . ' dans la région de  ' . $region->nom;

        $regions = Region::orderBy("created_at", "desc")->get();

        return view('modules.rapports', compact(
            'individuelles',
            'title',
            'regions',
        ));
    }/* 
    public function reports(Request $request)
    {
        $title = 'rapports opérateurs';

        $modules = Module::orderBy("created_at", "desc")->get();
        $domaines = Domaine::orderBy("created_at", "desc")->get();
        $regions = Region::orderBy("created_at", "desc")->get();

        $total_count = Module::count();

        $count_module = number_format($modules?->count(), 0, ',', ' ');

        if ($count_module < "1") {
            $title = 'Aucun module';
        } elseif ($count_module == "1") {
            $title = $count_module . ' module sur un total de ' . $total_count;
        } else {
            $title = 'Liste des ' . $count_module . ' modules sur un total de ' . $total_count;
        }

        return view(
            "modules.index",
            compact(
                "modules",
                "domaines",
                "regions",
                "title"
            )
        );
    }
    public function generateReport(Request $request)
    {
        $this->validate($request, [
            'region' => 'required|string',
            'module' => 'required|string',
            'statut' => 'required|string',
        ]);

        $region = Region::findOrFail($request->region);

        $individuelles = Individuelle::join('modules', 'individuelles.modules_id', 'modules.id')
            ->select('individuelles.*')
            ->where('statut', 'LIKE', "%{$request->statut}%")
            ->where('regions_id',  "{$request->region}")
            ->where('modules.name', 'LIKE', "%{$request->module}%")
            ->distinct()
            ->get();


        $count = $individuelles->count();

        if (isset($count) && $count <= "1") {
            $individuelle = 'demandeur';
            if (isset($request->statut) && $request->statut == "nouvelle") {
                $statut = 'nouveau';
            } elseif (isset($request->statut) && $request->statut == "terminer") {
                $statut = 'a terminé la formation';
            } elseif (isset($request->statut) && $request->statut == "rejeter") {
                $statut = 'rejeté';
            } elseif (isset($request->statut) && $request->statut == "attente") {
                $statut = 'en attente de formation';
            } elseif (isset($request->statut) && $request->statut == "retenue") {
                $statut = 'retenu';
            } else {
                $statut = $request->statut;
            }
        } else {
            $individuelle = 'demandeurs';
            if (isset($request->statut) && $request->statut == "nouvelle") {
                $statut = 'nouveaux';
            } elseif (isset($request->statut) && $request->statut == "terminer") {
                $statut = 'ont terminé leur formation';
            } elseif (isset($request->statut) && $request->statut == "rejeter") {
                $statut = 'rejetés';
            } elseif (isset($request->statut) && $request->statut == "attente") {
                $statut = 'en attente de formation';
            } elseif (isset($request->statut) && $request->statut == "retenue") {
                $statut = 'retenus';
            } else {
                $statut = $request->statut;
            }
        }
        $title = $count . ' ' . $individuelle . ' ' . $statut . ' en ' . $request->module . ' dans la région de  ' . $region->nom;

        $regions = Region::orderBy("created_at", "desc")->get();

        return view('modules.rapports', compact(
            'individuelles',
            'title',
            'regions',
        ));
    } */
}
