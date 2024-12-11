<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartStoreRequest;
use App\Models\Courrier;
use App\Models\Depart;
use App\Models\Direction;
use App\Models\Employee;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class DepartController extends Controller
{

    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|courrier|a-courrier']);
        /* $this->middleware(['permission:arrive-show']); */
        // or with specific guard
        /* $this->middleware(['role_or_permission:super-admin']); */
    }
    public function index()
    {
        $departs = Depart::orderBy('created_at', 'desc')->get();
        $anneeEnCours = date('Y');
        $an = date('y');

        $numCourrier = Depart::join('courriers', 'courriers.id', 'departs.courriers_id')
            ->select('departs.*')
            ->where('courriers.annee', $anneeEnCours)
            ->get()->last();

        if (isset($numCourrier)) {
            $numCourrier = Depart::get()->last()->numero;
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

        $total_count = Depart::get();
        $total_count = number_format($total_count->count(), 0, ',', ' ');

        $departs = Depart::take(100)
            ->latest()
            ->get();
        $count_courrier = number_format($departs?->count(), 0, ',', ' ');

        if ($count_courrier < "1") {
            $title = 'Aucun courrier';
        } elseif ($count_courrier == "1") {
            $title = $count_courrier . ' courrier sur un total de ' . $total_count;
        } else {
            $title = 'Liste des ' . $count_courrier . ' derniers courriers sur un total de ' . $total_count;
        }

        $today = date('Y-m-d');
        $count_today = Depart::where("created_at", "LIKE",  "{$today}%")->count();

        return view("courriers.departs.index", compact("departs", "numCourrier", "anneeEnCours", "today", "count_today", "title"));
    }
    public function create()
    {
        $anneeEnCours = date('Y');
        $an = date('y');

        $numCourrier = Depart::join('courriers', 'courriers.id', 'departs.courriers_id')
            ->select('departs.*')
            ->where('courriers.annee', $anneeEnCours)
            ->get()->last();

        if (isset($numCourrier)) {
            $numCourrier = Depart::get()->last()->numero;
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
        return view("courriers.departs.create", compact('anneeEnCours', 'numCourrier'));
    }
    public function store(DepartStoreRequest $request): RedirectResponse
    {
        $courrier = new Courrier([
            'date_depart'        =>      $request->input('date_depart'),
            'numero'             =>      $request->input('numero_correspondance'),
            'date_cores'         =>      $request->input('date_corres'),
            'annee'              =>      $request->input('annee'),
            'objet'              =>      $request->input('objet'),
            'numero_reponse'     =>      $request->input('numero_reponse'),
            'date_reponse'       =>      $request->input('date_reponse'),
            'observation'        =>      $request->input('observation'),
            'reference'          =>      $request->input('service_expediteur'),
            'type'               =>      'depart',
            "user_create_id"     =>      Auth::user()->id,
            "user_update_id"     =>      Auth::user()->id,
            'users_id'           =>      Auth::user()->id

        ]);

        $courrier->save();

        $depart = new Depart([
            'numero'             =>      $request->input('numero_depart'),
            'destinataire'       =>      $request->input('destinataire'),
            'courriers_id'       =>      $courrier->id

        ]);

        $depart->save();
        Alert::success('Félicitations', 'courrié ajouté avec succès');
        return back();
        /* $status = "Enregistrement effectué avec succès";
        return redirect()->back()->with("status", $status); */
    }


    public function edit($id)
    {
        $depart = Depart::findOrFail($id);
        return view("courriers.departs.update", compact("depart"));
    }

    public function update(Request $request, $id)
    {
        $depart = Depart::findOrFail($id);
        $courrier = Courrier::findOrFail($depart->courriers_id);

        $imp = $request->input('imp');

        if (isset($imp) && $imp == "1") {
            $courrier = $depart->courrier;
            /* $count = count($request->product); */
            $courrier->directions()->sync($request->id_direction);
            $courrier->employees()->sync($request->id_employe);
            $courrier->description =  $request->input('description');
            $courrier->date_imp    =  $request->input('date_imp');
            $courrier->save();

            /* $status = 'Courrier imputé avec succès';

            return Redirect::route('departs.index')->with('status', $status); */

            Alert::success('Félicitations !', 'Courrier imputé avec succès');
            return Redirect::route('departs.index');

            //solution, récuper l'id à partir de blade avec le mode hidden
        }

        $this->validate($request, [
            "date_depart"           => ["required", "date"],
            "date_corres"           => ["required", "date"],
            "numero_correspondance" => ["required", "string", "min:4", "max:6", "unique:courriers,numero,Null,id,deleted_at,NULL" . $depart->courrier->id],
            "numero_depart"         => ["required", "string", "min:4", "max:6", "unique:departs,numero,Null,id,deleted_at,NULL" . $depart->id],
            "annee"                 => ["required", "string"],
            "objet"                 => ["required", "string"],
            "destinataire"          => ["required", "string"],
            "numero_reponse"        => ["string", "min:4", "max:6", "nullable", "unique:courriers,numero_reponse,Null,id,deleted_at,NULL" . $courrier->id],
            "date_reponse"          => ["nullable", "date"],
            "observation"           => ["nullable", "string"],
            "reference"             => ["nullable", "string"],
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
            $courrier->update(
                [
                    'date_depart'        =>      $request->input('date_depart'),
                    'numero'             =>      $request->input('numero_correspondance'),
                    'date_cores'         =>      $request->input('date_corres'),
                    'annee'              =>      $request->input('annee'),
                    'objet'              =>      $request->input('objet'),
                    'numero_reponse'     =>      $request->input('numero_reponse'),
                    'date_reponse'       =>      $request->input('date_reponse'),
                    'observation'        =>      $request->input('observation'),
                    'reference'          =>      $request->input('service_expediteur'),
                    'file'               =>      $filePath,
                    'legende'            =>      $request->input('legende'),
                    'type'               =>      'depart',
                    "user_create_id"     =>      Auth::user()->id,
                    "user_update_id"     =>      Auth::user()->id,
                    'users_id'           =>      Auth::user()->id
                ]
            );
        } else {
            $courrier->update(
                [
                    'date_depart'        =>      $request->input('date_depart'),
                    'numero'             =>      $request->input('numero_correspondance'),
                    'date_cores'         =>      $request->input('date_corres'),
                    'annee'              =>      $request->input('annee'),
                    'objet'              =>      $request->input('objet'),
                    'numero_reponse'     =>      $request->input('numero_reponse'),
                    'date_reponse'       =>      $request->input('date_reponse'),
                    'observation'        =>      $request->input('observation'),
                    'reference'          =>      $request->input('service_expediteur'),
                    'legende'            =>      $request->input('legende'),
                    'type'               =>      'depart',
                    "user_create_id"     =>      Auth::user()->id,
                    "user_update_id"     =>      Auth::user()->id,
                    'users_id'           =>      Auth::user()->id
                ]
            );
        }
        $depart->update(
            [
                'numero'             =>      $request->input('numero_depart'),
                'destinataire'       =>      $request->input('destinataire'),
                'courriers_id'       =>      $courrier->id
            ]
        );

        /*  $status = 'Courrier mis à jour effectuée avec succès'; */

        Alert::success('Félicitations', 'courrié modifié avec succès');

        /* return Redirect::route('departs.index')->with('status', $status); */
        return Redirect::back();
    }

    public function show($id)
    {
        $depart = Depart::findOrFail($id);

        $courrier = Courrier::findOrFail($depart->courriers_id);

        $user_create = User::find($courrier->user_create_id);
        $user_update = User::find($courrier->user_update_id);

        $user_create_name = $user_create->firstname . ' ' . $user_create->name;
        $user_update_name = $user_update->firstname . ' ' . $user_update->name;

        return view("courriers.departs.show", compact("depart", "courrier", "user_create_name", "user_update_name"));
    }
    public function destroy($departId)
    {
        $depart = Depart::findOrFail($departId);
        $depart->courrier()->delete();
        $depart->delete();
        $status = "courrier supprimer avec succès";
        return redirect()->back()->with("danger", $status);
    }


    public function departImputation(Request $request, $id)
    {
        $depart = Depart::findOrFail($id);
        $courrier = $depart->courrier;

        return view("courriers.departs.imputation-depart", compact("depart", "courrier"));
    }

    function fetch(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');

            $data = DB::table('directions')
                ->where('sigle', 'LIKE', "%{$query}%")
                ->get();

            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $direction) {
                $id = $direction->id;
                $sigle = $direction->sigle;
                $employe_id = $direction->chef_id;
                $employe = Employee::find($employe_id);

                $user = User::find($employe->users_id);

                $name = $user->firstname . ' ' . $user->name;

                $output .= '
       
                <li data-id="' . $id . '" data-chef="' . $name . '" data-employeid="' . $employe->id . '"><a href="#">' . $sigle . '</a></li>
       ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function couponDepart(Request $request)
    {
        $depart = Depart::find($request->input('id'));
        $courrier = $depart->courrier;

        /*  $directions     = Direction::pluck('sigle', 'id'); */

        $directions = Direction::pluck('sigle', 'sigle')->all();

        $departDirections = $courrier->directions->pluck('sigle', 'sigle')->all();

        $numero = $courrier->numero;

        $title = ' Coupon d\'envoi courrier départ n° ' . $numero;

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);

        $actions = [
            'Urgent',
            'M\'en parler',
            'Etudes et Avis',
            'Répondre',
            'Suivi',
            'Information',
            'Diffusion',
            'Attribution',
            'Classement',
        ];

        $dompdf->loadHtml(view('courriers.departs.depart-coupon', compact(
            'depart',
            'courrier',
            'directions',
            'departDirections',
            'title',
            'actions'
        )));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        $anne = date('d');
        $anne = $anne . ' ' . date('m');
        $anne = $anne . ' ' . date('Y');
        $anne = $anne . ' à ' . date('H') . 'h';
        $anne = $anne . ' ' . date('i') . 'min';
        $anne = $anne . ' ' . date('s') . 's';

        $name = $courrier->expediteur . ', courrier départ n° ' . $numero . ' du ' . $anne . '.pdf';

        // Output the generated PDF to Browser
        $dompdf->stream($name, ['Attachment' => false]);
    }

    public function rapports(Request $request)
    {
        $title = 'rapports courriers départs';
        return view('courriers.departs.rapports', compact(
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

        $departs = Depart::whereBetween(DB::raw('DATE(created_at)'), array($request->from_date, $request->to_date))->get();

        $count = $departs->count();

        if ($from_date == $to_date) {
            if (isset($count) && $count < "1") {
                $title = 'aucun courrier départ le ' . $from_date;
            } elseif (isset($count) && $count == "1") {
                $title = $count . ' courrier départ le ' . $from_date;
            } else {
                $title = $count . ' courriers départs le ' . $from_date;
            }
        } else {
            if (isset($count) && $count < "1") {
                $title = 'aucun courrier départ entre le ' . $from_date . ' et le ' . $to_date;
            } elseif (isset($count) && $count == "1") {
                $title = $count . ' courrier départ entre le ' . $from_date . ' et le ' . $to_date;
            } else {
                $title = $count . ' courriers départs entre le ' . $from_date . ' et le ' . $to_date;
            }
        }

        return view('courriers.departs.rapports', compact(
            'departs',
            'from_date',
            'to_date',
            'title'
        ));
    }


    public function generateReport(Request $request)
    {
        $this->validate($request, [
            'numero'             => 'nullable|string',
            'objet'              => 'nullable|string',
            'expediteur'         => 'nullable|string',
        ]);

        if ($request?->numero == null && $request->objet == null && $request->expediteur == null && $request->destinataire == null) {
            Alert::warning('Attention ', 'Renseigner au moins un champ pour rechercher');
            return redirect()->back();
        }

        $departs = Depart::join('courriers', 'courriers.id', 'departs.courriers_id')
            ->select('departs.*')
            ->where('departs.numero', 'LIKE', "%{$request?->numero}%")
            ->where('departs.destinataire', 'LIKE', "%{$request?->destinataire}%")
            ->where('courriers.objet', 'LIKE', "%{$request?->objet}%")
            ->where('courriers.reference', 'LIKE', "%{$request?->expediteur}%")
            ->distinct()
            ->get();

        $count = $departs?->count();

        if (isset($count) && $count < "1") {
            $title = 'aucun courrier trouvé';
        } elseif (isset($count) && $count == "1") {
            $title = $count . ' courrier trouvé';
        } else {
            $title = $count . ' courriers trouvés';
        }

        /* $modules = Module::orderBy("created_at", "desc")->get(); */

        return view('courriers.departs.index', compact(
            'departs',
            'title'
        ));
    }
}
