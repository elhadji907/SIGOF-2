<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterneStoreRequest;
use App\Models\Courrier;
use App\Models\Interne;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class InterneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|courrier|a-courrier']);
    }

    public function index()
    {
        $anneeEnCours = date('Y');
        $an = date('y');

        $numCourrier = Interne::join('courriers', 'courriers.id', 'internes.courriers_id')
            ->select('internes.*')
            ->where('courriers.annee', $anneeEnCours)
            ->get()->last();

        if (isset($numCourrier)) {
            $numCourrier = Interne::join('courriers', 'courriers.id', 'internes.courriers_id')
                ->select('internes.*')
                ->get()->last()->numero;

            $numCourrier = ++$numCourrier;
        } else {
            $numCourrier = $an . "0001";

            $longueur = strlen($numCourrier);

            if ($longueur <= 1) {
                $numCourrier   =   strtolower("00000" . $numCourrier);
            } elseif ($longueur >= 2 && $longueur < 3) {
                $numCourrier   =   strtolower("0000" . $numCourrier);
            } elseif ($longueur >= 3 && $longueur < 4) {
                $numCourrier   =   strtolower("000" . $numCourrier);
            } elseif ($longueur >= 4 && $longueur < 5) {
                $numCourrier   =   strtolower("00" . $numCourrier);
            } elseif ($longueur >= 5 && $longueur < 6) {
                $numCourrier   =   strtolower("0" . $numCourrier);
            } else {
                $numCourrier   =   strtolower($numCourrier);
            }
        }

        $internes = Interne::get();
        $total_count = number_format($internes->count(), 0, ',', ' ');

        $count_courrier = number_format($internes?->count(), 0, ',', ' ');

        if ($count_courrier < "1") {
            $title = 'Aucun courrier';
        } elseif ($count_courrier == "1") {
            $title = $count_courrier . ' courrier sur un total de ' . $total_count;
        } else {
            $title = 'Liste des ' . $count_courrier . ' derniers courriers sur un total de ' . $total_count;
        }

        return view('courriers.internes.index', compact('internes', 'title', 'numCourrier', 'anneeEnCours'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'date_arrivee'              =>  ["required", "date"],
            /* 'date_correspondance'       =>  ["required", "date"], */
            'numero_interne'            =>  ["required", "string", "min:4", "max:6", "unique:internes,numero,Null,id,deleted_at,NULL"],
          /*   'numero_correspondance'     =>  ["required", "string", "min:4", "max:6", "unique:courriers,numero,Null,id,deleted_at,NULL"], */
            'annee'                     =>  ['required', 'numeric', 'min:2022'],
            'expediteur'                =>  ['required', 'string', 'max:200'],
            'objet'                     =>  ['required', 'string', 'max:200'],
        ]);

        $courrier = new Courrier([
            'date_recep'            =>      $request->input('date_arrivee'),
            'date_cores'            =>      $request->input('date_correspondance'),
            'numero'                =>      $request->input('numero_correspondance'),
            'annee'                 =>      $request->input('annee'),
            'objet'                 =>      $request->input('objet'),
            'expediteur'            =>      $request->input('expediteur'),
            'reference'             =>      $request->input('reference'),
            'numero_reponse'        =>      $request->input('numero_reponse'),
            'date_reponse'          =>      $request->input('date_reponse'),
            'observation'           =>      $request->input('observation'),
            'type'                  =>      'interne',
            "user_create_id"        =>      Auth::user()->id,
            "user_update_id"        =>      Auth::user()->id,
            'users_id'              =>      Auth::user()->id,
        ]);

        $courrier->save();

        $arrive = new Interne([
            'numero'             =>      $request->input('numero_interne'),
            'courriers_id'       =>      $courrier->id
        ]);

        $arrive->save();
        Alert::success("Félicitations !", "Courrier ajouté avec succès");
        return redirect()->back();
    }

    
    public function edit($id)
    {
        $interne = Interne::findOrFail($id);
        return view("courriers.internes.update", compact("interne"));
    }

    
    public function update(Request $request, $id)
    {
        $interne = Interne::findOrFail($id);
        $courrier = Courrier::findOrFail($interne->courriers_id);

        $imp = $request->input('imp');

        if (isset($imp) && $imp == "1") {
            $courrier = $interne->courrier;
            $interne->employees()->sync($request->id_emp);
            $interne->users()->sync($request->id_emp);
            $courrier->directions()->sync($request->id_direction);
            $courrier->description =  $request->input('description');
            $courrier->date_imp    =  $request->input('date_imp');
            $courrier->save();

            /*  $status = 'Courrier imputé avec succès';

            return Redirect::route('internes.index')->with('status', $status); */

            Alert::success('Félicitations !', 'Courrier imputé avec succès');

            return redirect()->back();

            //solution, récuper l'id à partir de blade avec le mode hidden
        }

        $this->validate($request, [
            "date_interne"          => ["required", "date"],
            /* "date_correspondance"   => ["required", "date"], */
           /*  "numero_correspondance" => ["nullable", "string", "min:6", "max:9", "unique:courriers,numero,{$interne->courrier->id}"], */
            "numero_interne"         => ["required", "string", "min:6", "max:9", "unique:internes,numero,{$interne->id}"],
            "annee"                 => ["required", "string"],
            "expediteur"            => ["required", "string"],
            "objet"                 => ["required", "string"],
            "numero_reponse"        => ["string", "min:6", "max:9", "nullable", "unique:courriers,numero_reponse,{$courrier->id}"],
            "date_reponse"          => ["nullable", "date"],
            "observation"           => ["nullable", "string"],
            "file"                  => ['sometimes', 'file', 'mimes:jpeg,png,jpg,gif,svg,pdf', 'max:2048']
        ]);

        if (isset($courrier->file)) {
            $this->validate($request, [
                "legende"          => ["required", "string"],
            ]);
        }

        if (request('file')) {
            $this->validate($request, [
                "legende"          => ["required", "string"],
            ]);

            $filePath = request('file')->store('courriers', 'public');

            $file = $request->file('file');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Remove unwanted characters
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);
            // Get the original image extension
            $extension = $file->getClientOriginalExtension();

            // Create unique file name
            $fileNameToStore = 'courriers/' . $filename . '' . time() . '.' . $extension;

            $courrier->update(
                [
                    'date_recep'       =>      $request->input('date_interne'),
                    'date_cores'       =>      $request->input('date_correspondance'),
                    'numero'           =>      $request->input('numero_correspondance'),
                    'annee'            =>      $request->input('annee'),
                    'objet'            =>      $request->input('objet'),
                    'expediteur'       =>      $request->input('expediteur'),
                    'reference'        =>      $request->input('reference'),
                    'numero_reponse'   =>      $request->input('numero_reponse'),
                    'date_reponse'     =>      $request->input('date_reponse'),
                    'observation'      =>      $request->input('observation'),
                    'file'             =>      $filePath,
                    'legende'          =>      $request->input('legende'),
                    'type'             =>      'interne',
                    "user_create_id"   =>      Auth::user()->id,
                    "user_update_id"   =>      Auth::user()->id,
                    'users_id'         =>      Auth::user()->id,
                ]
            );
        } else {
            $courrier->update(
                [
                    'date_recep'       =>      $request->input('date_interne'),
                    'date_cores'       =>      $request->input('date_correspondance'),
                    'numero'           =>      $request->input('numero_correspondance'),
                    'annee'            =>      $request->input('annee'),
                    'objet'            =>      $request->input('objet'),
                    'expediteur'       =>      $request->input('expediteur'),
                    'reference'        =>      $request->input('reference'),
                    'numero_reponse'   =>      $request->input('numero_reponse'),
                    'date_reponse'     =>      $request->input('date_reponse'),
                    'observation'      =>      $request->input('observation'),
                    'legende'          =>      $request->input('legende'),
                    'type'             =>      'interne',
                    "user_create_id"   =>      Auth::user()->id,
                    "user_update_id"   =>      Auth::user()->id,
                    'users_id'         =>      Auth::user()->id,
                ]
            );
        }

        $interne->update(
            [
                'numero'             =>      $request->input('numero_interne'),
                'courriers_id'       =>      $courrier->id,
            ]
        );

        Alert::success('Félicitations !', 'mise à jour effectuée');
        return Redirect::route('internes.index');
    }

    public function generateReport(Request $request)
    {
        $this->validate($request, [
            'numero'             => 'nullable|string',
            'objet'              => 'nullable|string',
            'expediteur'         => 'nullable|string',
        ]);

        if ($request?->numero == null && $request->objet == null && $request->expediteur == null) {
            Alert::warning('Attention ', 'Renseigner au moins un champ pour rechercher');
            return redirect()->back();
        }

        $internes = Interne::join('courriers', 'courriers.id', 'internes.courriers_id')
            ->select('internes.*')
            ->where('internes.numero', 'LIKE', "%{$request?->numero}%")
            ->where('courriers.objet', 'LIKE', "%{$request?->objet}%")
            ->where('courriers.expediteur', 'LIKE', "%{$request?->expediteur}%")
            ->distinct()
            ->get();

        $count = $internes?->count();

        if (isset($count) && $count < "1") {
            $title = 'aucun courrier trouvé';
        } elseif (isset($count) && $count == "1") {
            $title = $count . ' courrier trouvé';
        } else {
            $title = $count . ' courriers trouvés';
        }

        /* $modules = Module::orderBy("created_at", "desc")->get(); */

        return view('courriers.internes.index', compact(
            'internes',
            'title'
        ));
    }
}
