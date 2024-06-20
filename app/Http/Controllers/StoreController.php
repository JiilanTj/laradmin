<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('admin.superadmin.masterdata.store', compact('stores'));
    }

    public function create()
    {
        return view('admin.superadmin.masterdata.storecreate');
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'tipe' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
        ]);

        Store::create($validation);

        session()->flash('success', 'Store added successfully');
        return redirect(route('admin.superadmin.masterdata.store'));
    }

    public function edit($id)
    {
        $stores = Store::findOrFail($id);
        return view('admin.superadmin.masterdata.storeedit', compact('stores'));
    }

    public function update(Request $request, $id)
    {
        $stores = Store::findOrFail($id);

        $validation = $request->validate([
            'tipe' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
        ]);

        // Update stores details
        $stores->tipe = $validation['tipe'];
        $stores->nama = $validation['nama'];
        $stores->phone = $validation['phone'];
        $stores->alamat = $validation['alamat'];
        $stores->provinsi = $validation['provinsi'];
        $stores->kota = $validation['kota'];
        $stores->kecamatan = $validation['kecamatan'];
        $stores->kode_pos = $validation['kode_pos'];
        $stores->latitude = $validation['latitude'];
        $stores->longitude = $validation['longitude'];

        $stores->save();

        session()->flash('success', 'Store updated successfully');
        return redirect(route('admin.superadmin.masterdata.store'));    
    }

    public function delete($id)
    {
        Store::findOrFail($id)->delete();
        session()->flash('success', 'Store deleted successfully');
        return redirect(route('admin.superadmin.masterdata.store'));
    }

}
