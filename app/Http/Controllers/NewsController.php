<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('category')->get();
        return view('back-end.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::where('status', 'publish')->select('id', 'cat_title')->get();
        return view('back-end.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function news_store(Request $request)
    {
        $news = new News;

        $request->validate([
            'picture' => 'nullable|image|mimes:png,jpg|max:10000',
            'title' => 'string|required',
            'cat_id' => 'integer|required',
            'description' => 'nullable',
            'content' => 'required',
            // 'status' => 'required'
        ]);

        if (isset($request->picture)) {
            $file_name = 'news' . date('d-M-Y') . time() . "." . $request->picture->extension();
            $file_path = 'news';
            $request->picture->storeAs($file_path, $file_name, 'public');
            $news->picture = $file_name;
        }
        $news->user_id = Auth::user()->id;
        $news->title = $request->title;
        $news->slug = Str::of($request->title)->slug('-');
        $news->cat_id = $request->cat_id;
        $news->description = $request->description;
        $news->content = $request->content;
        $news->status = $request->status;
        $news->save();

        return redirect()->route('news.index')->with('success', 'Item has been Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
