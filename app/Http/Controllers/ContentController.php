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
    public function content_update(Request $request,$id)
    {
        // 'content_title',
        // 'title',
        // 'title_1',
        // 'description',
        // 'layout',
        // 'picture',
        // 'picture_1',
        // 'picture_2',
        // 'picture_3',
        // 'picture_4',

        // 'content',
        // 'content_1',
        // 'link',
        // 'link_1',
        // is_homepage
        // 'status',
        $request->validate([
            'layout' => 'required',
            'content_title' => 'required',
            'title' => 'required',
            'title_1' => 'required_if:layout,one_x_col,two_x_col',
            'description' => 'required',
            'picture' => 'required',
            'picture_1' => 'required_if:layout,two_x_col,three_x_col,four_x_col',
            'picture_2' => 'required_if:layout,three_x_col,four_x_col',
            'picture_3' => 'required_if:layout,four_x_col',
            'content' => 'required_if:layout,one_x_col',
            'content_1' => 'nullable',
            'link' => 'required_if:layout,two_x_col',
            'link_1' => 'required_if:layout,two_x_col',
            'is_homepage' => 'required',
            'status' => 'required',
        ]);


        $content = content::find($id);
        $content->content_title = $request->content_title;
        $content->title = $request->title;
        $content->title_1 = $request->title_1;
        $content->picture = $request->picture;

        $content->description = $request->description;
        $content->status = $request->status;
        $content->save();
        return redirect()->route('content.index')->with('success','Content updated successfully');
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
