<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
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
    public function sendWelcomeEmail(Request $request)
    {
        $formation = Formation::findOrFail($request->input('id'));
        foreach ($formation->individuelles as $individuelle) {
            $toEmail = $individuelle?->user?->email;
            $toUserName = $individuelle?->user?->civilite . ' ' . $individuelle?->user?->firstname . ' ' . $individuelle?->user?->name;
            $message = $individuelle?->note_obtenue . '/20, avec la mention ' . $individuelle?->appreciation;
            $subject = 'Formation terminée ! ';
            $module = $formation?->module?->name;
            Mail::to($toEmail)->send(new WelcomeEmail($message, $subject, $toEmail, $toUserName, $module));
        }
        return back();
    }
}
