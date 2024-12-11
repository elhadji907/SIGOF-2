<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeFormationEmail;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailFormationController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin']);
        /* $this->middleware(['permission:arrive-show']); */
        // or with specific guard
        /* $this->middleware(['role_or_permission:super-admin']); */
    }
    public function sendFormationEmail(Request $request)
    {
        $formation = Formation::findOrFail($request->input('id'));
        foreach ($formation->individuelles as $individuelle) {
            $toEmail = $individuelle?->user?->email;
            $toUserName = $individuelle?->user?->civilite . ' ' . $individuelle?->user?->firstname . ' ' . $individuelle?->user?->name;
            $message = $formation?->date_debut?->format('d/m/Y') . ' au ' . $formation?->date_fin?->format('d/m/Y') .
                ' à ' . $formation?->lieu . ', ' . $formation?->departement?->nom . ' et sera assurée par l\'opérateur '
                . $formation?->operateur?->user?->operateur . '(' . $formation?->operateur?->user?->username . ')' . ', n° téléphone : ' . $formation?->operateur?->user?->telephone;
            $subject = 'Démarrage formation !';
            $module = 'Votre demande de formation en ' . $formation?->module?->name . ' est retenue, la formation est prévue du ' . $message;
            Mail::to($toEmail)->send(new WelcomeFormationEmail($message, $subject, $toEmail, $toUserName, $module));
        }
        return back();
    }
}
