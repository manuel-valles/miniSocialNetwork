<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import Article module
use App\Article;
// Import Auth
use Auth;

class ArticlesController extends Controller
{

    public function index()
    {
        //
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
        
        Article::create($request->all());


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
