<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Collective;
use App\Models\Demandeur;
use App\Models\File;
use App\Models\Individuelle;
use App\Models\Pcharge;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        /*  return view('auth.register'); */
        return view('user.register-page');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            /* 'prenom'                => ['required', 'string', 'max:50'], */
            'username'              => ['required', 'string', 'min:3','max:25', 'unique:' . User::class],
            'email'                 => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            /* 'telephone'             => ['required', 'string', 'max:25', 'min:9'], */
            /* 'adresse'               => ['required', 'string', 'max:255'], */
            /* 'date_naissance'        => ['required', 'date'],
            'lieu_naissance'        => ['required', 'string', 'max:50'], */
            'password'              => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            /* 'firstname' => $request->prenom,
            'laststname' => $request->nom, */
            'username' => $request->username,
            'email' => $request->email,
            /* 'telephone' => $request->telephone,
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance, */
            'password' => Hash::make($request->password),
        ]);

        $files = File::where('users_id', null)->distinct()->get();

        foreach ($files as $key => $file) {
            $file = File::create([
                'legende'   => $file->legende,
                'sigle'     => $file->sigle,
                'users_id'  => $user->id
            ]);
        }

        /*     $demandeur = Demandeur::create([
            'users_id' => $user->id,
        ]);

        $individuelle = Individuelle::create([
            'demandeurs_id' => $demandeur->id,
            'statut' => 'attente',
            'users_id' => $user->id,
        ]);

        $collective = Collective::create([
            'demandeurs_id' => $demandeur->id,
            'statut' => 'attente',
            'users_id' => $user->id,
        ]);

        $pcharge = Pcharge::create([
            'demandeurs_id' => $demandeur->id,
            'statut' => 'attente',
            'users_id' => $user->id,
        ]); */

        $user->assignRole($request->input('role'));
        
        Alert::success('Félicitations ! ' . $user->username, ' Votre compte est créé, merci de vérifier votre boite e-mail, pour activer votre compte');

        event(new Registered($user));
        /* event(new Registered($demandeur));
        event(new Registered($individuelle));
        event(new Registered($collective));
        event(new Registered($pcharge)); */

        /* Se connecter automatiquement après inscription */
        /* Auth::login($user); */

        /* Redirection vers le home directement après incrption */
        /* return redirect(RouteServiceProvider::HOME); */


        /* Redirection vers le connexion après incrption */
        /* $status = "Compte créé, merci de vous connecter";
        return redirect(RouteServiceProvider::LOGIN)->with('status', $status); */
        $status = "Compte créé, merci de vous connecter";
        return redirect(RouteServiceProvider::LOGIN)->with('status', __($status));
    }
}
