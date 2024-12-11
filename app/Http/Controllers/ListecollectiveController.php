<?php

namespace App\Http\Controllers;

use App\Models\Listecollective;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class ListecollectiveController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|Demandeur|DIOF']);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "cin"                  =>      ["required", "string", Rule::unique('listecollectives')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })],
            "civilite"             =>      "required|string",
            "firstname"            =>      "required|string",
            "name"                 =>      "required|string",
            "date_naissance"       =>      "date|string",
            "lieu_naissance"       =>      "required|string",
            "module"               =>      "required|string",
            "niveau_etude"         =>      "nullable|string",
            "telephone"            =>      "nullable|string|min:9|max:9",
        ]);

        $membre = Listecollective::create([
            'cin'                       =>      $request->input('cin'),
            'civilite'                  =>      $request->input('civilite'),
            'prenom'                    =>      $request->input('firstname'),
            'nom'                       =>      $request->input('name'),
            'date_naissance'            =>      $request->input('date_naissance'),
            'lieu_naissance'            =>      $request->input('lieu_naissance'),
            'niveau_etude'              =>      $request->input('niveau_etude'),
            'telephone'                 =>      $request->input('telephone'),
            'experience'                =>      $request->input('experience'),
            'autre_experience'          =>      $request->input('autre_experience'),
            'details'                   =>      $request->input('details'),
            'statut'                    =>      'nouveau',
            'collectivemodules_id'      =>      $request->input('module'),
            'collectives_id'            =>      $request->input('collective'),
        ]);

        $membre->save();

        Alert::success("Ajouté !", "avec succès");

        return redirect()->back();
    }

    public function edit($id)
    {
        $listecollective   = Listecollective::find($id);
        if ($listecollective->statut != 'nouveau') {
            Alert::warning('Désolez ! !', 'impossible de modifier ce demandeur');
            return redirect()->back();
        } else {
            return view("collectives.updateliste", compact("listecollective"));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "cin"                  =>      ["required", "string", Rule::unique('listecollectives')->where(function ($query) {
                return $query->whereNull('deleted_at');
            })->ignore($id)],
            "civilite"             =>      "required|string",
            "firstname"            =>      "required|string",
            "name"                 =>      "required|string",
            "date_naissance"       =>      "date|string",
            "lieu_naissance"       =>      "required|string",
            "module"               =>      "required|string",
            "niveau_etude"         =>      "nullable|string",
            "telephone"            =>      "nullable|string|min:9|max:9",
        ]);

        $listecollective   = Listecollective::find($id);

        $listecollective->update([
            'cin'                       =>      $request->input('cin'),
            'civilite'                  =>      $request->input('civilite'),
            'prenom'                    =>      $request->input('firstname'),
            'nom'                       =>      $request->input('name'),
            'date_naissance'            =>      $request->input('date_naissance'),
            'lieu_naissance'            =>      $request->input('lieu_naissance'),
            'niveau_etude'              =>      $request->input('niveau_etude'),
            'telephone'                 =>      $request->input('telephone'),
            'experience'                =>      $request->input('experience'),
            'autre_experience'          =>      $request->input('autre_experience'),
            'details'                   =>      $request->input('details'),
            'collectivemodules_id'      =>      $request->input('module'),
            'collectives_id'            =>      $request->input('collective'),
        ]);

        $listecollective->save();

        Alert::success("Modification effectuée !", "merci");

        return Redirect::route('collectivemodules.show', $request->input('module'));
    }

    public function show($id)
    {
        $listecollective   = Listecollective::find($id);
        return view("collectives.showlistecollective", compact("listecollective"));
    }

    public function destroy($id)
    {
        $listecollective   = Listecollective::find($id);

        if (!empty($listecollective->formations_id)) {
            Alert::warning('Désolez ! !', 'impossible');
            return redirect()->back();
        } else {
            $listecollective->delete();
            Alert::success('demandeur supprimé !');

            return redirect()->back();
        }
    }

    public function Validatelistecollective($id)
    {
        $listecollective = Listecollective::findOrFail($id);

        $listecollective->update([
            'statut'    =>  'attente',
        ]);
        $listecollective->save();
        Alert::success('Félicitations !', 'demande validée');
        return redirect()->back();
    }
}
