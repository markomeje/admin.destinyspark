<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    
    public function index()
    {
        $articles = Article::join('categories', 'categories.id', '=', 'articles.category_id')->join('authors', 'authors.id', '=', 'articles.author_id')->get(['articles.*', 'categories.name as categoryname', 'authors.user_id'])->paginate(18);
        return view('articles.index', ['title' => 'Articles', 'articles' => $articles]);
    }

    public function image($id, Request $request, Article $article)
    {
        $request->validate(['image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048']);
        $image = $request->file('image');

        $extension = $image->getClientOriginalExtension();
        $filename = strtolower(Str::random(32)).'.'.$extension;
        $path = 'images/articles';
        $image->move($path, $filename);

        $article = $article->find($id);
        $file = "{$path}/{$article->image}";
        if (file_exists($file)) unlink($file);
        
        $article->image = $filename;
        $article->update();
        return response()->json(['status' => 1, 'info' => 'Article image updated successfully'], 200);

    }

    public function status($id, Article $article)
    {
        $article = $article->find($id);
        $article->published = !$article->published;
        $article->update();
        return response()->json(['status' => 1, 'info' => 'Article status updated successfully'], 200);
    }

}
