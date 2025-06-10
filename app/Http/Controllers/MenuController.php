<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::ordered()->paginate(10);
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_text' => 'required|string|max:255',
            'menu_icon' => 'nullable|string|max:255',
            'menu_url' => 'required|string|max:255',
            'menu_order' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive'
        ]);

        Menu::create($request->all());

        return redirect()->route('menus.index')
            ->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'menu_text' => 'required|string|max:255',
            'menu_icon' => 'nullable|string|max:255',
            'menu_url' => 'required|string|max:255',
            'menu_order' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive'
        ]);

        $menu->update($request->all());

        return redirect()->route('menus.index')
            ->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu->delete();

        return redirect()->route('menus.index')
            ->with('success', 'Menu berhasil dihapus!');
    }
}
