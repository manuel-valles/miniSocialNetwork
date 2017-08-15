<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import Article module
use App\Article;
// Import Auth
use Auth;
// Import DB to do some queries
use DB;

class ArticlesController extends Controller
{

    public function index()
    {
        // ELOQUENT METHOD
        // Call the Article module and all its functions/articles
        // $articles = Article::all();
        // Just 10 articles per page
        $articles = Article::paginate(10);
        // return $articles;
        return view('articles.index', compact('articles'));
        // Now just the articles that are alive:
        // $articles = Article::whereLive(1)->get();

        // QUERY BUILDER METHOD
        // $articles = DB::table('articles')->get();
        // $articles = DB::table('articles')->whereLive(1)->get();
        // return $articles;

        // $article = DB::table('articles')->whereLive(1)->first();
        // In this case you need to use dd (object type error)
        // dd($article);

        
    }

    public function create()
    {
        return view('articles.create');
    }


    public function store(Request $request)
    {
        // return $request->all();

        // ELOQUENT METHOD
        // $article = new Article;
        // $article->user_id = Auth::user()->id;
        // $article->content = $request->content;
        // $article->live = (boolean)$request->live;
        // $article->post_on = $request->post_on;
        // $article->save();
        
        // CREATE METHOD
        Article::create($request->all());        
        // With an array instead:
        // Article::create([
        //     'user_id' => Auth::user()->id,
        //     'content' => $request->content,
        //     'live' => $request->live,
        //     'post_on' => $request->post_on
        // ]);

        
        // QUERY BUILDER
        // All() doesn't work. EXCEPT needed and untick live field.
        // DB::table('articles')->insert($request->except('_token'));

        // Other option: Adding an array. However it will give NULL for update_at and create_at
        // DB::table('articles')->insert([
        //     'user_id' => Auth::user()->id,
        //     'content' => $request->content,
        //     'live' => (boolean) $request->live,
        //     'post_on' => $request->post_on
        // ]);
        
        // Once it's stored it must be redirect to the main.
        return redirect('/articles');
    }


    public function show($id)
    {
        // $article = Article::find($id);
        $article = Article::findOrFail($id);
        // return $article;
        return view('articles.show', compact('article'));
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }


    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        if(!isset($request->live))
            $article->update(array_merge($request->all(), ['live' => false]));
        else
            $article->update($request->all());
        // Once it's updated it must be redirect to the main.
        return redirect('/articles');
    }

    public function destroy($id)
    {
        //
    }
}
