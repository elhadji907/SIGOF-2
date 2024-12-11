<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArriveOperateurStoreRequest;
use App\Http\Requests\ArriveStoreRequest;
use App\Models\Arrive;
use App\Models\Courrier;
use App\Models\Direction;
use App\Models\Employee;
use App\Models\Operateur;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ArriveController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|courrier|a-courrier']);
    }

    public function index()
    {
        $anneeEnCours = date('Y');
        $an = date('y');

        $numCourrier = Arrive::join('courriers', 'courriers.id', 'arrives.courriers_id')
            ->select('arrives.*')
            ->where('courriers.annee', $anneeEnCours)
            ->get()->last();

        if (isset($numCourrier)) {
            $numCourrier = Arrive::join('courriers', 'courriers.id', 'arrives.courriers_id')
                ->select('arrives.*')
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

        /* $arrives = Arrive::orderBy('created_at', 'desc')->get(); */

        $total_count = Arrive::where('type', null)->get();
        $total_count = number_format($total_count->count(), 0, ',', ' ');

        $arrives = Arrive::where('type', null)->take(100)
            ->latest()
            ->get();

        $count_courrier = number_format($arrives?->count(), 0, ',', ' ');

        if ($count_courrier < "1") {
            $title = 'Aucun courrier';
        } elseif ($count_courrier == "1") {
            $title = $count_courrier . ' courrier sur un total de ' . $total_count;
        } else {
            $title = 'Liste des ' . $count_courrier . ' derniers courriers sur un total de ' . $total_count;
        }

        $today = date('Y-m-d');

        $count_today = Arrive::where('type', null)->where("created_at", "LIKE",  "{$today}%")->count();

        return view("courriers.arrives.index", compact("arrives", "count_today", "anneeEnCours", "numCourrier", "title"));
    }

    public function create()
    {
        $anneeEnCours = date('Y');
        $an = date('y');

        $numCourrier = Arrive::join('courriers', 'courriers.id', 'arrives.courriers_id')
            ->select('arrives.*')
            ->where('courriers.annee', $anneeEnCours)
            ->get()->last();

        if (isset($numCourrier)) {
            $numCourrier = Arrive::join('courriers', 'courriers.id', 'arrives.courriers_id')
                ->select('arrives.*')
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

        return view("courriers.arrives.create", compact('anneeEnCours', 'numCourrier'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'date_arrivee'              =>  ["required", "date"],
            'date_correspondance'       =>  ["required", "date"],
            'numero_arrive'             =>  ["required", "string", "min:4", "max:6", "unique:arrives,numero,Null,id,deleted_at,NULL"],
            'numero_correspondance'     =>  ["required", "string", "min:4", "max:6", "unique:courriers,numero,Null,id,deleted_at,NULL"],
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
            'type'                  =>      'arrive',
            "user_create_id"        =>      Auth::user()->id,
            "user_update_id"        =>      Auth::user()->id,
            'users_id'              =>      Auth::user()->id,
        ]);

        $courrier->save();

        $arrive = new Arrive([
            'numero'             =>      $request->input('numero_arrive'),
            'courriers_id'       =>      $courrier->id
        ]);

        $arrive->save();
        Alert::success("Félicitations !", "Courrier ajouté avec succès");
        return redirect()->back();
    }

    public function addCourrierOperateur(ArriveOperateurStoreRequest $request): RedirectResponse
    {
        $user = new User([
            /* 'firstname'             =>      $request->input("prenom"),
            'name'                  =>      $request->input("nom"), */
            'username'              =>      $request->input("sigle"),
            'email'                 =>      $request->input('email'),
            "operateur"             =>       $request->input("expediteur"),
            "fixe"                  =>       $request->input("fixe"),
            /* 'lieu_naissance'        =>      $request->input("adresse"),
            "adresse"               =>      $request->input("adresse"), */
            'password'              =>      Hash::make($request->input('email')),
            'created_by'            =>      Auth::user()->id,
            'updated_by'            =>      Auth::user()->id
        ]);

        $user->save();

        $user->assignRole('Demandeur');

        $anneeEnCours = date('y');
        $annee = date('Y');
        $numero_agrement = $request->input("numero_arrive") . '.' . $anneeEnCours . '/ONFP/DG/DEC/' . $annee;
        $numero_coreespondance = $request->input("numero_arrive");

        $courrier = new Courrier([
            'date_recep'            =>      $request->input('date_arrivee'),
            'date_cores'            =>      $request->input('date_correspondance'),
            'numero'                =>      $numero_coreespondance,
            'annee'                 =>      $request->input('annee'),
            'objet'                 =>      $request->input('objet'),
            'expediteur'            =>      $request->input('expediteur'),
            'numero_reponse'        =>      $request->input('numero_reponse'),
            'date_reponse'          =>      $request->input('date_reponse'),
            'observation'           =>      $request->input('observation'),
            'type'                  =>      'arrive',
            "user_create_id"        =>      Auth::user()->id,
            "user_update_id"        =>      Auth::user()->id,
            'users_id'              =>      Auth::user()->id,
        ]);

        $courrier->save();

        $arrive = new Arrive([
            'numero'             =>      $request->input('numero_arrive'),
            'type'               =>      'operateur',
            'courriers_id'       =>      $courrier->id
        ]);

        $arrive->save();

        $operateur = Operateur::create([
            "numero_agrement"      =>       $numero_agrement,
            "type_demande"         =>       $request->input("type_demande"),
            "numero_dossier"       =>       $request->input("numero_dossier"),
            "annee_agrement"       =>       date('Y-m-d'),
            "statut_agrement"      =>       'nouveau',
            "users_id"             =>       $user->id,
            'courriers_id'         =>       $courrier->id
        ]);

        $operateur->save();

        $user->assignRole('Operateur');

        Alert::success("Félicitations !", "Courrier ajouté avec succès");
        return redirect()->back();
    }

    public function edit($id)
    {
        $arrive = Arrive::findOrFail($id);
        return view("courriers.arrives.update", compact("arrive"));
    }

    public function update(Request $request, $id)
    {
        $arrive = Arrive::findOrFail($id);
        $courrier = Courrier::findOrFail($arrive->courriers_id);

        $imp = $request->input('imp');

        if (isset($imp) && $imp == "1") {
            $courrier = $arrive->courrier;
            /* $count = count($request->product); */
            /* $courrier->directions()->sync($request->id_direction);
            $courrier->employees()->sync($request->id_employe); */
            $arrive->employees()->sync($request->id_emp);
            $arrive->users()->sync($request->id_emp);
            $courrier->directions()->sync($request->id_direction);
            $courrier->description =  $request->input('description');
            $courrier->date_imp    =  $request->input('date_imp');
            $courrier->save();

            /*  $status = 'Courrier imputé avec succès';

            return Redirect::route('arrives.index')->with('status', $status); */

            Alert::success('Félicitations !', 'Courrier imputé avec succès');

            return redirect()->back();

            //solution, récuper l'id à partir de blade avec le mode hidden
        }

        $this->validate($request, [
            "date_arrivee"          => ["required", "date"],
            "date_correspondance"   => ["required", "date"],
            "numero_correspondance" => ["nullable", "string", "min:6", "max:9", "unique:courriers,numero,{$arrive->courrier->id}"],
            "numero_arrive"         => ["required", "string", "min:6", "max:9", "unique:arrives,numero,{$arrive->id}"],
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

            /* dd($filePath); */

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

            /* dd($fileNameToStore); */

            /* $file = Image::make(public_path("/storage/{$filePath}"))->fit(800, 800); */

            /*  $file->save(); */

            $courrier->update(
                [
                    'date_recep'       =>      $request->input('date_arrivee'),
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
                    'type'             =>      'arrive',
                    "user_create_id"   =>      Auth::user()->id,
                    "user_update_id"   =>      Auth::user()->id,
                    'users_id'         =>      Auth::user()->id,
                ]
            );
        } else {
            $courrier->update(
                [
                    'date_recep'       =>      $request->input('date_arrivee'),
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
                    'type'             =>      'arrive',
                    "user_create_id"   =>      Auth::user()->id,
                    "user_update_id"   =>      Auth::user()->id,
                    'users_id'         =>      Auth::user()->id,
                ]
            );
        }

        $arrive->update(
            [
                'numero'             =>      $request->input('numero_arrive'),
                'courriers_id'       =>      $courrier->id,
            ]
        );

        /* $status = 'Mise à jour effectuée avec succès';

        return Redirect::route('arrives.index')->with('status', $status); */

        Alert::success('Félicitations !', 'mise à jour effectuée');
        return Redirect::route('arrives.index');
    }
    public function show($id)
    {
        $arrive = Arrive::findOrFail($id);

        $courrier = Courrier::findOrFail($arrive->courriers_id);

        $user_create = User::find($courrier->user_create_id);
        $user_update = User::find($courrier->user_update_id);

        $user_create_name = $user_create->firstname . ' ' . $user_create->name;
        $user_update_name = $user_update->firstname . ' ' . $user_update->name;

        return view("courriers.arrives.show", compact("arrive", "courrier", "user_create_name", "user_update_name"));
    }

    public function destroy($arriveId)
    {
        $arrive = Arrive::findOrFail($arriveId);
        $arrive->courrier()->delete();
        $arrive->delete();
        /*  $status = "Supprimer avec succès"; */
        Alert::success('Effectué !', 'courrier supprimé avec succès');
        /* return redirect()->back()->with("danger", $status); */
        return redirect()->back();
    }

    public function arriveImputation(Request $request, $id)
    {
        $arrive = Arrive::findOrFail($id);
        $courrier = $arrive->courrier;

        return view("courriers.arrives.imputation-arrive", compact("arrive", "courrier"));
    }

    function fetch(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');

            /* $data = DB::table('directions')
                ->where('sigle', 'LIKE', "%{$query}%")
                ->get(); */
            /* $data = DB::table('employees')->join('users', 'users.id', 'employees.users_id')
                ->select('employees.*')
                ->where('users.firstname', 'LIKE', "%{$query}%")
                ->orwhere('users.name', 'LIKE', "%{$query}%")
                ->get(); */


            $data = Employee::join('users', 'users.id', 'employees.users_id')
                ->select('employees.*')
                ->where('users.firstname', 'LIKE', "%{$query}%")
                ->orwhere('users.name', 'LIKE', "%{$query}%")
                ->get();

            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            /* foreach ($data as $direction) {
                $id = $direction->id;
                $sigle = $direction->sigle;
                $employe_id = $direction->chef_id;
                $employe = Employee::find($employe_id);

                $user = User::find($employe->users_id);

                $name = $user->firstname . ' ' . $user->name;

                $output .= '
       
                <li data-id="' . $id . '" data-chef="' . $name . '" data-employeid="' . $employe->id . '"><a href="#">' . $sigle . '</a></li>
       ';
            } */
            foreach ($data as $employe) {
                $id = $employe->id;
                $firstname = $employe->user->firstname;
                $name = $employe->user->name;
                $direction_name = $employe->direction->name;
                $iddirection = $employe->direction->id;
                $sigle = $employe->direction->sigle;

                $direction = $direction_name . ' (' . $sigle . ') ';

                $name = $firstname . ' ' . $name;

                $output .= '
       
                <li data-id="' . $id . '" data-direction="' . $direction . '" data-iddirection="' . $iddirection . '"><a href="#">' . $name . '</a></li>
       ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function couponArrive(Request $request)
    {
        $arrive = Arrive::find($request->input('id'));
        $courrier = $arrive->courrier;

        /*  $directions     = Direction::pluck('sigle', 'id'); */

        $directions = Direction::pluck('sigle', 'sigle')->all();

        $arriveDirections = $courrier->directions->pluck('sigle', 'sigle')->all();

        $numero = $courrier->numero;

        $title = ' Coupon d\'envoi ourrier arrivé n° ' . $numero;

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

        $dompdf->loadHtml(view('courriers.arrives.arrive-coupon', compact(
            'arrive',
            'courrier',
            'directions',
            'arriveDirections',
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

        $name = $courrier->expediteur . ', courrier arrivé n° ' . $numero . ' du ' . $anne . '.pdf';

        // Output the generated PDF to Browser
        $dompdf->stream($name, ['Attachment' => false]);
    }

    public function rapports(Request $request)
    {
        $title = 'rapports courriers arrivés';
        return view('courriers.arrives.rapports', compact(
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

        $arrives = Arrive::whereBetween(DB::raw('DATE(created_at)'), array($request->from_date, $request->to_date))->get();


        $count = $arrives->count();

        if ($from_date == $to_date) {
            if (isset($count) && $count < "1") {
                $title = 'aucun courrier arrivé le ' . $from_date;
            } elseif (isset($count) && $count == "1") {
                $title = $count . ' courrier arrivé le ' . $from_date;
            } else {
                $title = $count . ' courriers arrivés le ' . $from_date;
            }
        } else {
            if (isset($count) && $count < "1") {
                $title = 'aucun courrier arrivé entre le ' . $from_date . ' et le ' . $to_date;
            } elseif (isset($count) && $count == "1") {
                $title = $count . ' courrier arrivé entre le ' . $from_date . ' et le ' . $to_date;
            } else {
                $title = $count . ' courriers arrivés entre le ' . $from_date . ' et le ' . $to_date;
            }
        }

        return view('courriers.arrives.rapports', compact(
            'arrives',
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

        if ($request?->numero == null && $request->objet == null && $request->expediteur == null) {
            Alert::warning('Attention ', 'Renseigner au moins un champ pour rechercher');
            return redirect()->back();
        }

        $arrives = Arrive::join('courriers', 'courriers.id', 'arrives.courriers_id')
            ->select('arrives.*')
            ->where('arrives.numero', 'LIKE', "%{$request?->numero}%")
            ->where('courriers.objet', 'LIKE', "%{$request?->objet}%")
            ->where('courriers.expediteur', 'LIKE', "%{$request?->expediteur}%")
            ->distinct()
            ->get();

        $count = $arrives?->count();

        if (isset($count) && $count < "1") {
            $title = 'aucun courrier trouvé';
        } elseif (isset($count) && $count == "1") {
            $title = $count . ' courrier trouvé';
        } else {
            $title = $count . ' courriers trouvés';
        }

        /* $modules = Module::orderBy("created_at", "desc")->get(); */

        return view('courriers.arrives.index', compact(
            'arrives',
            'title'
        ));
    }

    public function arrivesop(Request $request)
    {
        $anneeEnCours = date('Y');
        $an = date('y');

        $numCourrier = Arrive::join('courriers', 'courriers.id', 'arrives.courriers_id')
            ->select('arrives.*')
            ->where('courriers.annee', $anneeEnCours)
            ->get()->last();

        $numDossier = Arrive::join('courriers', 'courriers.id', 'arrives.courriers_id')
            ->select('arrives.*')
            ->where('courriers.annee', $anneeEnCours)
            ->where('arrives.type', 'operateur')
            ->get()->last();

        if (isset($numCourrier) && isset($numDossier)) {
            $numCourrier = Arrive::join('courriers', 'courriers.id', 'arrives.courriers_id')
                ->select('arrives.*')
                ->get()->last()->numero;

            $numDossier = Arrive::join('courriers', 'courriers.id', 'arrives.courriers_id')
                ->select('arrives.*')
                ->where('arrives.type', 'operateur')
                ->get()->last()->numero_dossier;

            $numCourrier = ++$numCourrier;
        } elseif (isset($numCourrier)) {
            $numCourrier = Arrive::join('courriers', 'courriers.id', 'arrives.courriers_id')
                ->select('arrives.*')
                ->get()->last()->numero;

            $numCourrier = ++$numCourrier;
        } elseif (isset($numDossier)) {

            $numDossier = Arrive::join('courriers', 'courriers.id', 'arrives.courriers_id')
                ->select('arrives.*')
                ->where('arrives.type', 'operateur')
                ->get()->last()->numero_dossier;
        } else {

            $numCourrier = $an . "0001";
            $numDossier = "0001";

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

        /* $arrives = Arrive::orderBy('created_at', 'desc')->get(); */

        $total_count = Arrive::where('type', 'operateur')->get();
        $total_count = number_format($total_count->count(), 0, ',', ' ');

        $arrives = Arrive::where('type', 'operateur')->take(100)
            ->latest()
            ->get();

        $count_courrier = number_format($arrives?->count(), 0, ',', ' ');

        if ($count_courrier < "1") {
            $title = 'Aucun courrier';
        } elseif ($count_courrier == "1") {
            $title = $count_courrier . ' courrier sur un total de ' . $total_count;
        } else {
            $title = 'Liste des ' . $count_courrier . ' derniers courriers sur un total de ' . $total_count;
        }

        $today = date('Y-m-d');

        $count_today = Arrive::where('type', 'operateur')->where("created_at", "LIKE",  "{$today}%")->count();

        return view(
            "courriers.arrives.operateur",
            compact(
                "arrives",
                "count_today",
                "anneeEnCours",
                "numCourrier",
                "title",
                "numDossier"
            )
        );
    }
}
