<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\subMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    public function menu()
    {
        $menus = menu::all();
        $sub_menus = DB::table('sub_menus')
            ->leftJoin('menus', 'sub_menus.men_id', '=', 'menus.id')
            ->select('menus.title as men_title', 'sub_menus.*')->get();
        // dd($sub_menus);
        return view('back-end.menu.index', compact('menus', 'sub_menus'));
    }

    public function menuCreate()
    {
        return view('back-end.menu.create');
    }



    public function menuStore(Request $request)
    {

        $data = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|unique:menus,slug|string',
            'status' => 'required|string',
        ]);

        menu::create($data);
        return redirect()->route('menu.index')->with('success', 'Menu Item Created Successfully');
    }

    public function menuDelete($id)
    {
        menu::find($id)->delete();
        return redirect()->route('menu.index')->with('error', 'Menu Item Deleted Successfully');
    }


    public function subMenuCreate()
    {
        $menus = menu::where('status', 'publish')->get();
        return view('back-end.sub_menu.create', compact('menus'));
    }

    public function subMenuStore(Request $request)
    {

        $data = $request->validate([
            'men_id' => "required|integer",
            'title' => 'required|string',
            'slug' => 'required|unique:menus,slug|string',
            'status' => 'required|string',
        ]);

       $sub_menu = new subMenu;
            $sub_menu->men_id = $request->men_id;
            $sub_menu->sub_title = $request->title;
            $sub_menu->sub_slug = $request->slug;
            $sub_menu->status = $request->status;
            $sub_menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu Item Created Successfully');
    }

    public function subMenuDelete($id) {
        $subMenu = subMenu::FindOrFail($id);
        $subMenu->delete();
        return redirect()->route('menu.index')->with('error','Sub-menu delete successfully');
    }
}
