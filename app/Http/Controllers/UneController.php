<?php

namespace App\Http\Controllers;

use App\Models\Une;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class UneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|DIOF|DEC|DPP']);
        $this->middleware("permission:une-view", ["only" => ["index"]]);
        $this->middleware("permission:une-create", ["only" => ["create", "store"]]);
        $this->middleware("permission:une-update", ["only" => ["update", "edit"]]);
        $this->middleware("permission:une-show", ["only" => ["show"]]);
        $this->middleware("permission:une-delete", ["only" => ["destroy"]]);
        $this->middleware("permission:give-role-permissions", ["only" => ["givePermissionsToRole"]]);
    }
    public function index()
    {
        $unes = Une::orderBy("created_at", "desc")->get();
        return view('unes.index', compact('unes'));
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'titre1'      =>  ['required', 'string', 'max:40'],
            'titre2'      =>  ['required', 'string', 'max:35'],
            'message'    =>  ['required', 'string'],
            'image'      =>  ['image', 'nullable', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],

        ]);

        if (request('image')) {
            $imagePath = request('image')->store('unes', 'public');

            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(2400, 2400);

            $image->save();
        } else {
            $imagePath = null;
        }


        $une = new Une([
            'titre1'     => $data['titre1'],
            'titre2'     => $data['titre2'],
            'message'   => $data['message'],
            'users_id'  => auth()->user()->id,
            'image'     => $imagePath
        ]);

        $une->save();

        Alert::success("Publié !!!", "Félicitations");

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'titre1'      =>  ['required', 'string', 'max:40'],
            'titre2'      =>  ['required', 'string', 'max:35'],
            'message'    =>  ['required', 'string'],
            'image'      =>  ['image', 'nullable', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'video'    =>  ['nullable', 'string'],

        ]);

        $une = Une::findOrFail($id);

        if (request('image')) {

            $imagePath = request('image')->store('unes', 'public');

            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(2400, 2400);

            $image->save();
        } else {
            $imagePath = $une->image;
        }

        $une->update([
            'titre1'     => $data['titre1'],
            'titre2'     => $data['titre2'],
            'message'   => $data['message'],
            'video'   => $data['video'],
            'users_id'  => auth()->user()->id,
            'image'     => $imagePath
        ]);

        $une->save();

        Alert::success("Modification effectuée !!!");

        return redirect()->back();
    }

    public function destroy($id)
    {

        $Une   = Une::find($id);

        $Une->delete();

        Alert::success('Suppression effectuée !');

        return redirect()->back();
    }

    public function alaUne(Request $request)
    {

        $une = Une::findOrFail(request('alaune'));

        $alunes = Une::all();

        if (!empty($une->status)) {
            Alert::warning('Enregistrement déjà à la une !');

            return redirect()->back();
        } else {

            foreach ($alunes as $alune) {
                $alune->update([
                    'status' => null
                ]);

                $alune->save();
            }
            $une->update([
                'status' => 'Une'
            ]);

            $une->save();

            Alert::success('Mis à la une !');

            return redirect()->back();
        }
    }
}
