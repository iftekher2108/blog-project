<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function menu()
    {
        return view('back-end.menu.index');
    }

    public function menuCreate() {
        return view('back-end.menu.create');
    }

    public function menuStore(Request $request) {

       $data = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|unique:menus,slug|string',
        ]);

        menu::create($data);
        return redirect()->back()->with('success','Menu Created Successfully');


    }

}
