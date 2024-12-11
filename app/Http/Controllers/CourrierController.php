<?php

namespace App\Http\Controllers;

use App\Models\Arrive;
use App\Models\Courrier;
use App\Models\Depart;
use App\Models\Interne;
use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class CourrierController extends Controller
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
        $total_arrive = Arrive::count();
        $total_depart = Depart::count();
        $total_interne = Interne::count();

        $total_courrier = $total_arrive + $total_depart + $total_interne;

        if ($total_courrier != 0) {
            $pourcentage_arrive = ($total_arrive / $total_courrier) * 100;
            $pourcentage_depart = ($total_depart / $total_courrier) * 100;
            $pourcentage_interne = ($total_interne / $total_courrier) * 100;
        } else {
            $pourcentage_arrive = 0;
            $pourcentage_depart = 0;
            $pourcentage_interne = 0;
        }

        $arrives = DB::table('arrives')->where('deleted_at', null)->count();
        $departs = DB::table('departs')->where('deleted_at', null)->count();
        $internes = DB::table('internes')->where('deleted_at', null)->count();

        $roles = Role::orderBy('created_at', 'desc')->get();
        return view("courriers.index", compact("total_courrier", 'roles', 'total_arrive', 'total_depart', 'total_interne', 'pourcentage_arrive', 'pourcentage_depart', 'pourcentage_interne', 'arrives', 'departs', 'internes'));
    }

    public function showFromNotification(Courrier $courrier, DatabaseNotification $notification)
    {

        $notification->markAsRead();

        /* $typescourrier = $courrier->types_courrier->name; */
        /* $arrive = $courrier->arrives; */
        $arrives = $courrier->arrives;
        $departs = $courrier->departs;
        foreach ($arrives as $key => $arrive) {
        }
        foreach ($departs as $key => $depart) {
        }
        $departs = $courrier->departs;
        $internes = $courrier->internes;
        $bordereaus = $courrier->bordereaus;
        $facturesdafs = $courrier->facturesdafs;
        $tresors = $courrier->tresors;
        $banques = $courrier->banques;
        // $demandes = $courrier->demandeurs;

        /* $arrive = \App\Models\Arrive::get()->count();
        $interne = \App\Models\Interne::get()->count();
        $depart = \App\Models\Depart::get()->count(); */

        $user_create = User::find($courrier->user_create_id);
        $user_update = User::find($courrier->user_update_id);

        $user_create_name = $user_create->firstname . ' ' . $user_create->name;
        $user_update_name = $user_update->firstname . ' ' . $user_update->name;

        Alert::success('Lecture fait', 'le courrier a été visionné');

        /* return redirect()->back(); */

        if ($courrier->type == 'arrive') {
            return view("courriers.arrives.show", compact("arrive", "courrier", "user_create_name", "user_update_name"));
            /* return redirect()->back()->with('arrive', 'courrier', 'user_create_name', 'user_update_name'); */
        } elseif ($courrier->type == 'depart') {
            return view("courriers.departs.show", compact("depart", "courrier", "user_create_name", "user_update_name"));
            /* return redirect()->back()->with('depart', 'courrier', 'user_create_name', 'user_update_name'); */
        } else {
            return redirect()->back();
        }

        /*  if ($typescourrier == 'Courriers arrives') {            
            return view('arrives.show', compact('arrives','courrier'));
    
            } elseif($typescourrier == 'Courriers departs') {   
            return view('departs.show', compact('departs','courrier'));
    
            } elseif($typescourrier == 'Courriers internes') {    
                return view('internes.show', compact('internes','courrier'));
    
            }  
            elseif($typescourrier == 'Bordereau') {    
                return view('bordereaus.show', compact('bordereaus','courrier'));
    
            }  
            elseif($typescourrier == 'Factures daf') {    
                return view('facturesdafs.show', compact('facturesdafs','courrier'));
    
            }  
            elseif($typescourrier == 'Tresors') {    
                return view('tresors.show', compact('tresors','courrier'));
    
            }  elseif($typescourrier == 'Banques') {    
                return view('banques.show', compact('banques','courrier'));
        
            }else {
                return view('courriers.show', compact('courrier'));
            } */
    }

    public function notifications()
    {
        return view("courriers.notifications");
    }
}
