<?php

namespace App\Http\Controllers;

use App\Models\Individuelle;
use App\Models\Module;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class RegionController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin']);
        $this->middleware("permission:region-view", ["only" => ["index"]]);
        $this->middleware("permission:region-create", ["only" => ["create", "store"]]);
        $this->middleware("permission:region-update", ["only" => ["update", "edit"]]);
        $this->middleware("permission:region-show", ["only" => ["show"]]);
        $this->middleware("permission:region-delete", ["only" => ["destroy"]]);
    }
    public function index()
    {
        $regions = Region::orderBy("created_at", "desc")->get();

        $count_region = number_format($regions?->count(), 0, ',', ' ');

        if (isset($count_region) && $count_region == "0") {
            $title = 'Aucune région';
        } else {
            $title = 'Liste des ' . $count_region . ' régions';
        }

        return view(
            "localites.regions.index",
            compact(
                "regions",
                "title",
            )
        );
    }

    public function create()
    {
        return view("localites.regions.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "region" => "required|string|unique:regions,nom,except,id",
            "sigle" => "required|string|unique:regions,sigle,except,id",
        ]);

        $region = Region::create([
            "nom" => $request->input("region"),
            "sigle" => $request->input("sigle"),
        ]);

        $region->save();

        /* $status = "Région " . $region->nom . " ajoutée avec succès";
        return  redirect()->route("regions.index")->with("status", $status); */
        Alert::success('La région de ' . $region->nom, ' a été ajoutée avec succès');

        return redirect()->back();
    }

    public function show($id)
    {
        $region = Region::find($id);
        return view("localites.regions.show", compact("region"));
    }

    public function edit($id)
    {
        $region = Region::find($id);
        return view("localites.regions.update", compact("region"));
    }

    public function update(Request $request, $id)
    {
        $region = Region::find($id);
        $this->validate($request, [
            'nom'    => ['required', 'string', 'max:25', Rule::unique(Region::class)->ignore($id)],
            "sigle"     => ['required', 'string', 'max:25', Rule::unique(Region::class)->ignore($id)->whereNull('deleted_at')],
        ]);

        $region->update([
            'nom'       => $request->nom,
            'sigle'     => $request->sigle,
        ]);

        $region->save();

        /* $mesage = 'La région ' . $region->nom . '  a été modifiée';
        return redirect()->route("regions.index")->with("status", $mesage); */

        Alert::success('La région de ' . $region->nom, ' a été modifié avec succès');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $region = Region::find($id);
        $region->delete();

        /* $status = "Région " . $region->nom . " vient d'être supprimée";
        return redirect()->route("regions.index")->with('status', $status); */

        Alert::success('La région de ' . $region->nom, 'a été supprimée avec succès');
        return redirect()->back();
    }

    public function modal()
    {
        $regions = Region::all();
        return view('modal', compact('regions'));
    }

    public function updateRegion(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'string'
        ]);
        $region = Region::findOrFail($request->input('id'));
        $region->nom = $request->input('name');
        $region->save();

        return redirect()->route('modal')->with('success', 'Région modifiée avec succès');
    }

    public function addRegion(Request $request)
    {
        $this->validate($request, [
            "region" => "required|string|unique:regions,nom,except,id",
            "sigle" => "required|string|unique:regions,sigle,except,id",
        ]);

        $region = Region::create([
            "nom" => $request->input("region"),
            "sigle" => $request->input("sigle"),
        ]);

        $region->save();

        $status = "Région " . $region->nom . " ajoutée avec succès";

        return  redirect()->route("regions.index")->with("status", $status);
    }

    public function regionsmodule($idlocalite)
    {
        $localite = Region::findOrFail($idlocalite);

        $individuelles = Individuelle::where('regions_id', $idlocalite)->get();

        return view("localites.regions.regionsmodule", compact("localite", "individuelles"));
    }

    public function regionstatut($idlocalite, $statut)
    {
        $localite = Region::findOrFail($idlocalite);

        $individuelles = Individuelle::where('regions_id', $idlocalite)->where('statut', $statut)->get();

        return view("localites.regions.regionstatut", compact("localite", "individuelles", "statut"));
    }
    public function rapports(Request $request)
    {
        $regions = Region::orderBy("created_at", "desc")->get();

        $count_region = number_format($regions?->count(), 0, ',', ' ');

        if ($count_region == "0") {
            $title = 'Aucune région';
        } else {
            $title = 'Liste des ' . $count_region . ' régions';
        }

        return view(
            "localites.regions.index",
            compact(
                "regions",
                "title",
            )
        );
    }
    public function generateRapport(Request $request)
    {
        $this->validate($request, [
            'region' => 'required|string',
            'statut' => 'required|string',
        ]);

        $region = Region::where('nom', $request?->region)->first();
        $statut = $request?->statut;

        if (isset($request?->region) && isset($request?->statut)) {
            $individuelles = Individuelle::where('statut', 'LIKE', "%{$request->statut}%")
                ->where('regions_id',  "{$region?->id}")
                ->distinct()
                ->get();

            $individuellesmodules = Module::join('individuelles', 'individuelles.modules_id', 'modules.id')
                ->select('modules.*')
                ->where('individuelles.statut', 'LIKE', "%{$request->statut}%")
                ->where('individuelles.regions_id',  "{$region?->id}")
                ->distinct()
                ->get();

            $count = $individuelles->count();

            if (isset($count) && $count == "0") {
                $title = 'aucune demande trouvée dans la région de ' . $request?->region . ' avec le statut ' . $request?->statut;
            } else {
                $title = $count . ' demandes trouvées dans la région de ' . $request?->region . ' avec le statut ' . $request?->statut;
            }
        } else {
            $regions = Region::orderBy("created_at", "desc")->get();

            $count_region = number_format($regions?->count(), 0, ',', ' ');

            if (isset($count_region) && $count_region == "0") {
                $title = 'Aucune région';
            } else {
                $title = 'Liste des ' . $count_region . ' régions';
            }

            return view(
                "localites.regions.index",
                compact(
                    "regions",
                    "title",
                )
            );
        }

        $regions = Region::orderBy("created_at", "desc")->get();

        return view('localites.regions.rapports', compact(
            'individuelles',
            'title',
            'regions',
            'statut',
            'region',
            'individuellesmodules',
        ));
    }
}
