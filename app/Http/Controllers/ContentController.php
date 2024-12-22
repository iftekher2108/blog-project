<?php

namespace App\Http\Controllers;

use App\Models\content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function content()
    {
        $contents = content::get(['id','content_title','title','picture','status']);
        return view('back-end.content.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function content_edit($id)
    {
        $content = content::find($id);
        return view('back-end.content.edit',compact('content'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(content $content)
    {
        //
    }
}
