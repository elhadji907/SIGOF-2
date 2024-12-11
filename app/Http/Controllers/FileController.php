<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|DIOF|DEC|DPP|Operateur|Demandeur']);
        $this->middleware("permission:file-update", ["only" => ["update"]]);
    }
    public function index()
    {
        $files = File::get();
        $users = User::get();

        return view('files.index', compact('files', 'users'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'legende'           => 'required |string',
            'file'              => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);

        $file = File::where('id', $request->legende)
            ->where('users_id', Auth::user()->id)
            ->firstOrFail();

        // Check if the file is valid
        if ($request->file('file')->isValid()) {
            // Store the file in the 'uploads' directory on the 'public' disk
            $filePath = $request->file('file')->store('uploads', 'public');
            // Return success response
            $file->update([
                'file'      =>   $filePath,
            ]);

            $file->save();

            Alert::success('réussi !', 'Fichier téléchargé avec succès');

            return redirect()->back();
        }
        // Return error response
        Alert::warning('erreur !', 'Échec du téléchargement du fichier');
        return redirect()->back();
    }

    public function fileDestroy(Request $request)
    {
        $file = File::findOrFail($request->idFile);

        $file->update([
            'file'      => null
        ]);

        Alert::success($file->legende, 'a été retiré');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $_FILES = File::find($id);
        $_FILES->delete();

        Alert::success('Fait', 'fichier supprimé avec succès');
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'legende'       => 'required|string',
            'user'          => 'required|string',
        ]);

        $file = File::where('legende', $request?->legende)?->first();

        $sigle = $file?->sigle;

        $file =  File::create([
            'legende'   => $request?->legende,
            'sigle'     => $sigle,
            'users_id'  => $request?->user,
        ]);

        $file?->save();

        Alert::success('Félicitations !!!', 'fichier ajouté avec succès');
        return redirect()->back();
    }
}
