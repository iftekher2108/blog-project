<?php

namespace App\Http\Controllers;

use App\Models\content;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

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
            'picture_1' => 'required_if:layout,two_x_col,three_x_col,four_x_col||nullable',
            'picture_2' => 'required_if:layout,three_x_col,four_x_col||nullable',
            'picture_3' => 'required_if:layout,four_x_col||nullable',
            'content' => 'required_if:layout,one_x_col||nullable',
            'content_1' => 'nullable',
            'link' => 'required_if:layout,two_x_col||nullable',
            'link_1' => 'required_if:layout,two_x_col||nullable',
            'status' => 'required',
        ]);

        $content = content::find($id);
        $content->layout = $request->layout;
        $content->content_title = $request->content_title;
        $content->title = $request->title;
        $content->title_1 = $request->title_1;
        $content->description = $request->description;
        $driver = new ImageManager(new Driver());
        if(isset($request->picture)) {
            Storage::delete('public/'.$content->picture);
            $dir_name = 'content/';
            $file_name = 'picture'.time().'.'.$request->picture->extension();
            $request->picture->storeAs($dir_name, $file_name,'public');
            $image = $driver->read('storage/'.$dir_name . $file_name);
            $image->resize(600, 400);
            $image->save('storage/'.$dir_name . $file_name);
            $content->picture = $dir_name . $file_name;
        }

        if( !empty($request->picture_1) && isset($request->picture_1)) {
            Storage::delete('public/'.$content->picture_1);
            $dir_name_1 = 'content/';
            $file_name_1 = 'picture_1'.time().'.'.$request->picture_1->extension();
            $request->picture_1->storeAs($dir_name_1, $file_name_1,'public');
            $image_1 = $driver->read('storage/'.$dir_name_1 . $file_name_1);
            $image_1->resize(600, 400);
            $image_1->save('storage/'.$dir_name_1 . $file_name_1);
            $content->picture_1 = $dir_name_1 . $file_name_1;
        }
        if(!empty($request->picture_2) &&  isset($request->picture_2)) {
            Storage::delete('public/'.$content->picture_2);
            $dir_name_2 = 'content/';
            $file_name_2 = 'picture_2'.time().'.'.$request->picture_2->extension();
            $request->picture_2->storeAs($dir_name_2, $file_name_2,'public');
            $image_2 = $driver->read('storage/'.$dir_name_2 . $file_name_2);
            $image_2->resize(600, 400);
            $image_2->save('storage/'.$dir_name_2 . $file_name_2);
            $content->picture_2 = $dir_name_2 . $file_name_2;
        }
        if(!empty($request->picture_3) && isset($request->picture_3)) {
            Storage::delete('public/'.$content->picture_3);
            $dir_name_3 = 'content/';
            $file_name_3 = 'picture_3'.time().'.'.$request->picture_3->extension();
            $request->picture_3->storeAs($dir_name_3, $file_name_3,'public');
            $image_3 = $driver->read('storage/'.$dir_name_3 . $file_name_3);
            $image_3->resize(600, 400);
            $image_3->save('storage/'.$dir_name_3 . $file_name_3);
            $content->picture_3 = $dir_name_3 . $file_name_3;
        }

        $content->content = $request->content;
        $content->content_1 = $request->content_1;
        $content->link = $request->link;
        $content->link_1 = $request->link_1;
        $content->is_homepage = !empty($request->is_homepage) ? $request->is_homepage : 0;
        $content->status = $request->status;
        $content->save();

        return redirect()->route('content.index')->with('success',"Content $content->content_title updated successfully");
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
