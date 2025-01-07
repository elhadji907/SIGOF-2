<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|DIOF|DEC|DPP']);
        $this->middleware("permission:contact-view", ["only" => ["index"]]);
        $this->middleware("permission:contact-create", ["only" => ["create", "store"]]);
        $this->middleware("permission:contact-update", ["only" => ["update", "edit"]]);
        $this->middleware("permission:contact-show", ["only" => ["show"]]);
        $this->middleware("permission:contact-delete", ["only" => ["destroy"]]);
        $this->middleware("permission:give-role-permissions", ["only" => ["givePermissionsToRole"]]); */
    }
    public function index()
    {
        $contacts = Contact::orderBy("created_at", "desc")->get();
        return view('contacts.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'emailadresse'  =>  ['required', 'email'],
            'telephone'     =>  ['required', 'string', 'max:9', 'min:9'],
            'objet'         =>  ['required', 'string'],
            'message'       =>  ['required', 'string'],

        ]);

        $contact = new Contact([
            'email'         => $data['emailadresse'],
            'telephone'     => $data['telephone'],
            'objet'         => $data['objet'],
            'message'       => $data['message'],
        ]);

        $contact->save();

        Alert::success("Félicitations !!!", "Votre message a été envoyé. Merci! !");

        /* $status = "Félicitation, Votre message a été envoyé. Merci !"; */

        /* return redirect()->back()->with('status', $status); */
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'telephone'     =>  ['required', 'string', 'max:9', 'min:9'],
            'objet'         =>  ['required', 'string'],
            'message'       =>  ['required', 'string'],
            'reponse'       =>  ['nullable', 'string'],
            'statut'        =>  ['nullable', 'string'],

        ]);

        $contact = Contact::findOrFail($id);

        $contact->update([
            'telephone'     => $data['telephone'],
            'objet'         => $data['objet'],
            'message'       => $data['message'],
            'reponse'       => $data['reponse'],
            'statut'        => $data['statut'],
        ]);

        $contact->save();

        Alert::success("Modification effectuée !!!");

        return redirect()->back();
    }


    public function destroy($id)
    {

        $Contact   = Contact::find($id);

        $Contact->delete();

        Alert::success('Suppression effectuée !');

        return redirect()->back();
    }

    public function uneContacts(Request $request)
    {

        $une = Contact::findOrFail(request('alaune'));
        
        $une->update([
            'statut' => 'Evidence'
        ]);

        $une->save();

        Alert::success('Mis en évidence !');

        return redirect()->back();
    }
}
