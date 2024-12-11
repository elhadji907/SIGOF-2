<?php

namespace App\Http\Controllers;

use App\Models\Convention;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class ConventionController extends Controller
{
    public function __construct()
    {
        // examples:
        $this->middleware('auth');
        $this->middleware(['role:super-admin|admin|Demandeur|DIOF|ADIOF|DEC']);
        $this->middleware("permission:convention-view", ["only" => ["index"]]);
        /* $this->middleware(['permission:arrive-show']); */
        // or with specific guard
        /* $this->middleware(['role_or_permission:super-admin']); */
    }
    public function index()
    {
        $conventions = Convention::get();
        return view('conventions.index', compact('conventions'));
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            "name"      => "required|string|unique:conventions,name,except,id",
        ]);

        $convention = Convention::create([
            'name'      => $request?->name,
        ]);

        $convention?->save();

        Alert::success('La convention ', ' a été ajouté avec succès');

        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $convention = Convention::find($id);

        $this->validate($request, [
            "name"      => ['required', 'string', 'max:250', Rule::unique(Convention::class)->ignore($id)],
        ]);

        $convention->update([
            'name'      => $request?->name,
        ]);

        $convention->save();

        Alert::success('La convention ', ' a été modifié avec succès');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $convention = Convention::find($id);
        $convention->delete();

        Alert::success('La convention ', 'a été supprimée avec succès');

        return redirect()->back();
    }
}
