<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            if (!!$request->categoryId) {
                $articles = Article::where('category_id', $request->categoryId)->latest()->paginate(5);
                $categoryId = $request->categoryId;
            } else {

                $articles = Article::latest()->paginate(5);
                $categoryId = null; 
            }
            $categories = Category::latest()->get();
            return view('article.index', compact(['articles', 'categories', 'categoryId']));
        } catch (\Throwable $th) {
        }
    }


    /**
     * Filter a listing of the resource.
     */
    public function filter(Request $request)
    {
        try {
            $articles = Article::where('category_id', $request->categoryId)->latest()->paginate(5);
            $categories = Category::latest()->get();
            return view('article.index', compact(['articles', 'categories']));
        } catch (\Throwable $th) {
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {

            $categories = Category::latest()->get();
            return view('article.create', compact('categories'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request)
    {
        try {

            $image = uploadFile($request->image);
            Article::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $image,
                'category_id' => $request->categoryId
            ]);
            return redirect()->route('articles.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
