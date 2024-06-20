<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('id', 'desc')->get();

        return view('admin.superadmin.items.home', compact('items'));
    }

    public function create()
    {
        return view('admin.superadmin.items.create');
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'nama_item' => 'required|string|max:255',
            'stok' => 'required|integer',
        ]);

        Item::create($validation);

        session()->flash('success', 'Item added successfully');
        return redirect(route('admin/superadmin/items'));
    }

    public function edit($id)
    {
        $items = Item::findOrFail($id);
        return view('admin.superadmin.items.update', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $items = Item::findOrFail($id);

        $validation = $request->validate([
            'nama_item' => 'required|string|max:255',
            'stok' => 'required|integer',
        ]);

        // Update items details
        $items->nama_item = $validation['nama_item'];
        $items->stok = $validation['stok'];

        $items->save();

        session()->flash('success', 'Items updated successfully');
        return redirect(route('admin/superadmin/items'));    
    }

    public function delete($id)
    {
        Item::findOrFail($id)->delete();
        session()->flash('success', 'Item deleted successfully');
        return redirect(route('admin/superadmin/items'));
    }
}
