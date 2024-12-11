<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view("employes.categories.index", compact('categories'));
    }
    
    public function create()
    {
        return view("employes.categories.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [         
            'categories.*.name' => 'required|unique:categories,name'
        ]);

        /* dd($request->categories); */
        
        foreach ($request->categories as $key => $value) {
            Category::create($value);
        }

        /* Category::create([
            "name" => $request->name
        ]); */

        return redirect()->route("categories.create")->with("status", "Catégorie créée avec succès");
    }

    public function edit($id)
    {
        $categorie = Category::find($id);
        return view("employes.categories.update", compact('categorie'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', Rule::unique(Category::class)->ignore($id)]
        ]);

        Category::find($id)->update([
            'name' => $request->name
        ]);

        $categories = Category::get();
        $mesage = 'La categorie a été modifiée';
        return redirect()->route("categories.index", compact('categories'))->with("status", $mesage);
    }

    public function destroy($id)
    {
        $categorie = Category::find($id);
        $categorie->delete();
        $mesage = 'La catégorie ' . $categorie->name . ' a été supprimée';
        return redirect()->back()->with("danger", $mesage);
    }
}
