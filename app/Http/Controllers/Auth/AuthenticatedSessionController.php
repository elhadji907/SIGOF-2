<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Antenne;
use App\Models\Collective;
use App\Models\Contact;
use App\Models\Individuelle;
use App\Models\Operateur;
use App\Models\Poste;
use App\Models\Projet;
use App\Models\Service;
use App\Models\Une;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function accueil(): View
    {
        /* return view('auth.login'); */
        $une = Une::where("status", "!=", null)->first();
        $projets = Projet::where("image", "!=", null)->get();
        $contacts = Contact::limit(5)->orderBy("created_at", "desc")->where("statut", "!=", null)->get();
        $today = date('Y-m-d');

        $annee = date('Y');
        $anciennete = date('Y') - '1987';

        $services = Service::get();
        $postes = Poste::orderBy("created_at", "desc")->limit(4)->get();

        $count_today = Individuelle::where("created_at", "LIKE",  "{$today}%")->count();
        $count_individuelles = Individuelle::count();
        $count_collectives = Collective::count();
        $count_projets = Projet::count();
        $antennes = Antenne::get();
        $count_operateurs = Operateur::where('statut_agrement', 'agréer')->count();

        if ($count_today <= "0") {
            $title = "nouvelle demande aujourd'hui";
        } else {
            $title = "nouvelles demandes aujourd'hui";
        }

        return view(
            'accueil',
            compact(
                'une',
                'count_today',
                'title',
                'projets',
                'contacts',
                'count_individuelles',
                'count_projets',
                'count_operateurs',
                'count_collectives',
                'anciennete',
                'antennes',
                'services',
                'postes',
            )
        );
    }

    public function create(): View
    {
        /* return view('auth.login'); */
        return view('user.login-page');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        Alert::success('Bienvenue ! '  . Auth::user()->firstname . ' ' . Auth::user()->name, 'Vous êtes bien connecté');

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
