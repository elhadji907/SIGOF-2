<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view("employes.articles.index", compact('articles'));
    }
    
    public function create()
    {
        return view("employes.articles.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [         
            'articles.*.name' => 'required|unique:articles,name'
        ]);

        /* dd($request->articles); */
        
        foreach ($request->articles as $key => $value) {
            Article::create($value);
        }

        /* Article::create([
            "name" => $request->name
        ]); */

        return redirect()->route("articles.create")->with("status", "article créé avec succès");
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view("employes.articles.update", compact('article'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', Rule::unique(Article::class)->ignore($id)]
        ]);

        Article::find($id)->update([
            'name' => $request->name
        ]);

        $articles = Article::get();
        $mesage = "L'article a été modifié";
        return redirect()->route("articles.index", compact('articles'))->with("status", $mesage);
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        $mesage = "L'article " . $article->name . ' a été supprimé';
        return redirect()->back()->with("danger", $mesage);
    }
}
